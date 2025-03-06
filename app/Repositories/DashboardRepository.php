<?php

namespace App\Repositories;

use App\Models\Building;
use App\Models\CallLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardRepository
{
    public function getData($request)
    {
        $building_id = $request->query('building_id');
        $today = Carbon::today();

        $buildings = $this->fetchBuildings();

        $total_call_logs = CallLog::when($building_id, function ($query) use ($building_id) {
            return $query->where('building_id', $building_id);
        })->count();

        $today_call_log_count = CallLog::when($building_id, function ($query) use ($building_id) {
            return $query->where('building_id', $building_id);
        })->whereDate('created_at', $today)->count();

        $graph_buildings = Building::withCount('callLogs')->get();
        $chartData = [
            'names' => $graph_buildings->pluck('name')->toArray(),
            'callLogs' => $graph_buildings->pluck('call_logs_count')->toArray(),
        ];

        $data = [
            'buildings' => $buildings,
            'total_call_logs_count' => $total_call_logs,
            'today_call_log_count' => $today_call_log_count,
            'chartData' =>  $chartData,
        ];

        return $data;
    }

    public function fetchBuildings()
    {
        if (Auth::user()->role_id == 3) {
            return Building::where('user_id', Auth::user()->id)->select('id', 'name')->get();
        } else {
            return Building::select('id', 'name')->get();
        }
    }

    public function getStaffData($request)
    {
        $building_name = $request->query('building_name');
        $today = Carbon::today();

        $buildings = $this->fetchBuildings();

        if (Auth::user()->role_id == 3) {
            $buildingIds = $buildings->pluck('id');
            $total_call_logs = CallLog::whereIn('building_id', $buildingIds)->count();
            $today_call_log_count = CallLog::whereIn('building_id', $buildingIds)->whereDate('created_at', $today)->count();
            $graph_buildings = Building::where('user_id', Auth::user()->id)->withCount('callLogs')->get();
        } else {
            $total_call_logs = CallLog::when($building_name, function ($query) use ($building_name) {
                return $query->where('name', $building_name);
            })->count();

            $today_call_log_count = CallLog::when($building_name, function ($query) use ($building_name) {
                return $query->where('name', $building_name);
            })->whereDate('created_at', $today)->count();

            $graph_buildings = Building::withCount('callLogs')->get();
        }

        // if (Auth::user()->role_id == 3) {
        //     $graph_buildings = Building::where('user_id', Auth::user()->id)->withCount('callLogs')->get();
        // } else {
        //     $graph_buildings = Building::withCount('callLogs')->get();
        // }
        
        $chartData = [
            'names' => $graph_buildings->pluck('name')->toArray(),
            'callLogs' => $graph_buildings->pluck('call_logs_count')->toArray(),
        ];

        $data = [
            'buildings' => $buildings,
            'total_call_logs_count' => $total_call_logs,
            'today_call_log_count' => $today_call_log_count,
            'chartData' =>  $chartData,
        ];
        return $data;
    }
}
