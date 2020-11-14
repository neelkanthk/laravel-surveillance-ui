<?php

namespace Neelkanth\Laravel\SurveillanceUi\Http\Controllers;

use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiController;
use Neelkanth\Laravel\Surveillance\Services\Surveillance;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class SurveillanceUiLogsController extends SurveillanceUiController
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
                $filters = request()->only("draw", "datetime_range");
                $filters["limit"] = request()->get("length");
                $filters["search"] = request()->get("search");
                $filters["search"] = $filters["search"]["value"];
                if (!empty($filters["datetime_range"])) {
                    $range = explode("to", $filters["datetime_range"]);
                    $filters["from_datetime"] = !empty(trim($range[0])) ? trim($range[0]) : null;
                    $filters["to_datetime"] = !empty(trim($range[1])) ? trim($range[1]) : null;
                }
                $filters["page"] = request()->get("start") == 0 ? 1 : ((int) request()->get("start") / $filters["limit"]) + 1;
                $logs = Surveillance::logger()->getPaginatedAndFilteredLogs($filters);
                $data = array();
                if (!empty($logs["data"])) {
                    $data = $this->dataTableRows($logs["data"]);
                }
                return [
                    "draw" => $filters["draw"],
                    "recordsFiltered" => $logs["total"],
                    "recordsTotal" => Surveillance::logger()->totalLogs(),
                    "data" => $data
                ];
            } else {
                return view('surveillance-ui::logs.index');
            }
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }
    }

    /**
     * Prepare data to be sent to DataTable
     */
    public function dataTableRows($logs)
    {
        $data = array();
        foreach ($logs as $log) {
            array_push($data, [
                "id" => $log["id"],
                "ip" => !empty($log["ip"]) ? $log["ip"] : "-",
                "userid" => !empty($log["userid"]) ? $log["userid"] : "-",
                "fingerprint" => !empty($log["fingerprint"]) ? $log["fingerprint"] : "-",
                "url" => !empty($log["url"]) ? substr($log["url"], 0, 45) . '...' : "-",
                "created_at" => $log["created_at"],
                "actions" => view('surveillance-ui::logs.partials.actions', ['id' => $log["id"]])->render()
            ]);
        }
        return $data;
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
            $log = Surveillance::logger()->getLogById($id);
            $data = $log;
            $code = 200;
        } catch (ModelNotFoundException $ex) {
            $data = __('surveillance-ui::app.alerts.not_found');
            $code = 404;
        } catch (Exception $ex) {
            $data = __('surveillance-ui::app.alerts.generic_error');
            $code = 500;
        } finally {
            return view('surveillance-ui::logs.show', compact("data"));
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
            Surveillance::logger()->deleteLogById($id);
            request()->session()->flash('flash_message', __('surveillance-ui::app.alerts.log_delete_success'));
        } catch (Exception $ex) {
            request()->session()->flash('flash_message', __('surveillance-ui::app.alerts.generic_error'));
        } finally {
            return redirect()->route('surveillance-ui.logs.index');
        }
    }
}
