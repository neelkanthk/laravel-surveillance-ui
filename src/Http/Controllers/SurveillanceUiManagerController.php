<?php

namespace Neelkanth\Laravel\SurveillanceUi\Http\Controllers;

use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiController;
use Neelkanth\Laravel\SurveillanceUi\Http\Requests\CreateSurveillanceManagerRequest as CreateRequest;
use Neelkanth\Laravel\SurveillanceUi\Http\Requests\UpdateSurveillanceManagerRequest as UpdateRequest;
use Neelkanth\Laravel\Surveillance\Services\Surveillance;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class SurveillanceUiManagerController extends SurveillanceUiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (request()->ajax()) {
                $filters = request()->only("type", "status", "draw");
                $filters["limit"] = request()->get("length");
                $filters["search"] = request()->get("search");
                $filters["search"] = $filters["search"]["value"];
                $filters["page"] = request()->get("start") == 0 ? 1 : ((int) request()->get("start") / $filters["limit"]) + 1;
                $records = Surveillance::manager()->getPaginatedAndFilteredRecords($filters);
                $data = array();
                if (!empty($records["data"])) {
                    $data = $this->dataTableRows($records["data"]);
                }
                return [
                    "draw" => $filters["draw"],
                    "recordsFiltered" => $records["total"],
                    "recordsTotal" => Surveillance::manager()->totalRecords(),
                    "data" => $data
                ];
            } else {
                return view('surveillance-ui::manager.index');
            }
        } catch (Exception $ex) {
        }
    }

    /**
     * Prepare data to be sent to DataTable
     */
    public function dataTableRows($records)
    {
        $data = array();
        foreach ($records as $record) {
            array_push($data, [
                "id" => $record["id"],
                "type" => trans("surveillance-ui::app.surveillance_types." . $record["type"]),
                "value" => $record["value"],
                "status" => view('surveillance-ui::manager.partials.badges', ['surveillance' => $record])->render(),
                "actions" => view('surveillance-ui::manager.partials.actions', ['id' => $record["id"]])->render()
            ]);
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surveillance-ui::manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Neelkanth\Laravel\SurveillanceUi\Http\Requests\CreateSurveillanceManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try {
            $type = $request->get("type");
            $value = $request->get("value");
            $status = $request->get("status");

            if (in_array("enable", $status)) {
                if (Surveillance::manager()->isSurveillanceEnabled($value, $value, $value)) {
                    $request->session()->flash('flash_message', __('surveillance-ui::app.alerts.surveillance_already_enabled'));
                } else {
                    $surveillance = Surveillance::manager()->type($type)->value($value)->enableSurveillance();
                    if (!empty($surveillance->id)) {
                        $request->session()->flash('flash_message', __('surveillance-ui::app.alerts.surveillance_enable_success'));
                    }
                }
            }
            if (in_array("block", $status)) {
                if (Surveillance::manager()->isAccessBlocked($value, $value, $value)) {
                    $request->session()->flash('flash_message', __('surveillance-ui::app.alerts.access_already_blocked'));
                } else {
                    $surveillance = Surveillance::manager()->type($type)->value($value)->blockAccess();
                    if (!empty($surveillance->id)) {
                        $request->session()->flash('flash_message', __('surveillance-ui::app.alerts.access_block_success'));
                    }
                }
            }
        } catch (Exception $ex) {
            $request->session()->flash('flash_message', __('surveillance-ui::app.alerts.generic_error'));
        } finally {
            return redirect()->route('surveillance-ui.manager.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = null;
        $code = 404;
        try {
            $record = Surveillance::manager()->getRecordById($id);
            $data = $record;
            $code = 200;
        } catch (ModelNotFoundException $ex) {
            $data = __('surveillance-ui::app.alerts.not_found');
            $code = 404;
        } catch (Exception $ex) {
            $data = __('surveillance-ui::app.alerts.generic_error');
            $code = 500;
        } finally {
            return response()->json(["data" => $data], $code);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surveillanceRecord = Surveillance::manager()->getRecordById($id);
        return view('surveillance-ui::manager.edit', compact('surveillanceRecord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Neelkanth\Laravel\SurveillanceUi\Http\Requests\UpdateSurveillanceManagerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $type = $request->get("type");
            $value = $request->get("value");
            $status = $request->get("status");

            if (in_array("enable", $status)) {
                $surveillance = Surveillance::manager()->type($type)->value($value)->enableSurveillance();
                if (!empty($surveillance->id)) {
                    $request->session()->flash('flash_message', __('surveillance-ui::app.alerts.surveillance_enable_success'));
                }
            }
            if (!in_array("enable", $status) || in_array("disable", $status)) {
                $surveillance = Surveillance::manager()->type($type)->value($value)->disableSurveillance();
                if (!empty($surveillance->id)) {
                    $request->session()->flash('flash_message', __('surveillance-ui::app.alerts.surveillance_disable_success'));
                }
            }
            if (in_array("block", $status)) {
                $surveillance = Surveillance::manager()->type($type)->value($value)->blockAccess();
                if (!empty($surveillance->id)) {
                    $request->session()->flash('flash_message', __('surveillance-ui::app.alerts.access_block_success'));
                }
            }
            if (!in_array("block", $status) || in_array("unblock", $status)) {
                $surveillance = Surveillance::manager()->type($type)->value($value)->unblockAccess();
                if (!empty($surveillance->id)) {
                    $request->session()->flash('flash_message', __('surveillance-ui::app.alerts.access_unblock_success'));
                }
            }
        } catch (Exception $ex) {
            $request->session()->flash('flash_message', __('surveillance-ui::app.alerts.generic_error'));
        } finally {
            return redirect()->route('surveillance-ui.manager.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Surveillance::manager()->removeRecordById($id);
            request()->session()->flash('flash_message', __('surveillance-ui::app.alerts.record_delete_success'));
        } catch (Exception $ex) {
            request()->session()->flash('flash_message', __('surveillance-ui::app.alerts.generic_error'));
        } finally {
            return redirect()->route('surveillance-ui.manager.index');
        }
    }
}
