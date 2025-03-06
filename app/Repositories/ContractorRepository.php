<?php

namespace App\Repositories;

use App\Models\Contractor;

class ContractorRepository
{
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        return Contractor::all();
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
