<?php

namespace App\Http\Controllers;

use App\Exports\BuildingsExport;
use App\Imports\BuildingsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class BuildingExportController extends Controller
{
    /**
     * Export buildings to Excel.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new BuildingsExport, 'buildings.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new BuildingsImport, $request->file('file'));

        return back()->with('success', 'Buildings imported successfully!');
    }
}
