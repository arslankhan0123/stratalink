<?php

namespace App\Repositories;

use App\Models\Building;
use App\Models\Contractor;
use Illuminate\Support\Facades\Auth;

class ContractorRepository
{
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        if (Auth::user()->role_id == 3) {
            $buildings = Building::where('user_id', Auth::user()->id)->get();
            $buildingIds = Building::where('user_id', Auth::user()->id)->pluck('id');
            return Contractor::whereIn('building_id', $buildingIds)->orderBy('id', 'desc')->get();
        } else {
            return Contractor::orderBy('id', 'desc')->get();
        }
    }

    /**
     * Method store
     *
     * @param $request $request [explicite description]
     *
     * @return void
     */
    public function store($request)
    {
        return Contractor::create($request->all());
    }

    /**
     * Method show
     *
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function show($id)
    {
        return Contractor::find($id);
    }

    /**
     * Method update
     *
     * @param $request $request [explicite description]
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function update($request, $id)
    {
        $contractor = Contractor::find($id);
        return $contractor->update($request->all());
    }

    /**
     * Method destroy
     *
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function destroy($id)
    {
        Contractor::destroy($id);
    }
}
