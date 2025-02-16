<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\CallLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        // Clear session before storing new values
        session()->forget(['building_ids', 'call_log_ids']);
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
        $building_ids = $buildings->pluck('id')->toArray();
        $call_log_ids = $call_logs->pluck('id')->toArray();
        session([
            'building_ids' => $building_ids,
            'call_log_ids' => $call_log_ids
        ]);
        return view('admin.reports.index', compact('buildings', 'call_logs', 'clients'));
    }

    public function exportPDF(Request $request)
    {
        $building_ids = session('building_ids', []);
        $call_log_ids = session('call_log_ids', []);

        // Fetch the data
        $buildings = Building::whereIn('id', $building_ids)->get();
        $callLogs = CallLog::whereIn('id', $call_log_ids)->get();

        // Load the view and pass data
        $pdf = Pdf::loadView('admin.pdf.buildings_call_logs', compact('buildings', 'callLogs'));

        // Download PDF
        return $pdf->download('buildings_call_logs.pdf');
    }
}
