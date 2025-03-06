<?php

namespace App\Repositories;

use App\Models\Building;
use Exception;
use Illuminate\Support\Facades\Auth;

class BuildingRepository
{

    public function all($request)
    {
        if (Auth::user()->role_id == 3) {
            $data = Building::where('user_id', Auth::user()->id)->get();
        } else {
            $data = Building::all();
        }
        return $data;
        // return Building::ApplyFilter(
        //     $request->only([''])
        // )->get();
    }

    public function store($request)
    {
        try {
            Building::create($request->all());
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function show($id)
    {
        return Building::find($id);
    }

    public function update($request, $id)
    {
        try {
            $building = Building::find($id);
            $building->update($request->all());
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Building::destroy($id);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
