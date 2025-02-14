<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\CallLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $clients = User::where('role_id', 3)->get();

        $buildingQuery = Building::query();
        $callLogQuery = CallLog::query();

        if (Auth::user()->role_id == 3) {
            $buildingQuery->where('user_id', Auth::user()->id);
            $callLogQuery->whereIn('building_id', $buildingQuery->pluck('id'));
            $buildings = $buildingQuery->get();
            $call_logs = $callLogQuery->get();
        } else if (Auth::user()->role_id == 2) {
            $buildingQuery->where('created_by', Auth::user()->id);
            $callLogQuery->whereIn('building_id', $buildingQuery->pluck('id'));
            $buildings = $buildingQuery->get();
            $call_logs = $callLogQuery->get();
        } else {
            if ($request->client_id) {
                $buildingQuery->where('user_id', $request->client_id);
                $callLogQuery->whereIn('building_id', $buildingQuery->pluck('id'));
            }
            $buildings = $buildingQuery->get();
            $call_logs = $callLogQuery->get();
        }
        return view('admin.reports.index', compact('buildings', 'call_logs', 'clients'));
    }
}
