<?php

namespace Neelkanth\Laravel\SurveillanceUi\Http\Controllers;

use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiController;
use Neelkanth\Laravel\SurveillanceUi\Http\Requests\CreateSurveillanceManagerRequest as CreateRequest;
use Neelkanth\Laravel\SurveillanceUi\Http\Requests\UpdateSurveillanceManagerRequest as UpdateRequest;
use Neelkanth\Laravel\Surveillance\Services\Surveillance;
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
        return view('surveillance-ui::manager.index');
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
        //
    }
}
