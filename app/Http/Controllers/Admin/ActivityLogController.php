<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

/**
 * Resource Controller untuk Model ActivityLog
 */
class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('activity_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if($request->ajax()){
            $activityLogs = ActivityLog::query()->select(sprintf('%s.*', (new ActivityLog)->getTable()));
            return DataTables::of($activityLogs)->toJson();
        }
        return view('pages.admin.activity-log');
    }
}
