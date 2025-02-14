<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Repositories\ContractorRepository;
use Exception;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    protected $contractorRepo;

    /**
     * Method __construct
     *
     * @param ContractorRepository $contractorRepo [explicite description]
     *
     * @return void
     */
    public function __construct(ContractorRepository $contractorRepo)
    {
        $this->contractorRepo = $contractorRepo;
    }

    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        try {
            $contractors = $this->contractorRepo->all();
            return view('admin.contractors.index', compact('contractors'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed.' . $exception->getMessage());
        }
    }

    /**
     * Method create
     *
     * @return void
     */
    public function create()
    {
        try {
            $buildings = Building::all();
            return view('admin.contractors.create', compact('buildings'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed.' . $exception->getMessage());
        }
    }

    /**
     * Method store
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $this->contractorRepo->store($request);
            return redirect()->route('contractors.index')->with('success', 'Contractor created successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Method edit
     *
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function edit($id)
    {
        try {
            $buildings = Building::all();
            $contractor = $this->contractorRepo->show($id);
            return view('admin.contractors.edit', compact('contractor', 'buildings'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to execute the cron job.' . $exception->getMessage());
        }
    }

    /**
     * Method update
     *
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        try {
            $this->contractorRepo->update($request, $id);
            return redirect()->route('contractors.index')->with('success', 'Contractor updated successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
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
        try {
            $this->contractorRepo->destroy($id);
            return redirect()->route('contractors.index')->with('success', 'Contractor deleted successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed.' . $exception->getMessage());
        }
    }
}
