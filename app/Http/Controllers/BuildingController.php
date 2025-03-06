<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Contractor;
use App\Models\Manager;
use App\Models\User;
use App\Repositories\BuildingRepository;
use Exception;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    protected $buildingRepo;

    /**
     * Method __construct
     *
     * @param BuildingRepository $buildingRepo [explicite description]
     *
     * @return void
     */
    public function __construct(BuildingRepository $buildingRepo)
    {
        $this->buildingRepo = $buildingRepo;
    }

    public function index(Request $request)
    {
        try {
            $buildings = $this->buildingRepo->all($request);
            $buildingManagers = Manager::where('type', 'Building Manager')->get();
            $strataManagers = Manager::where('type', 'Strata Manager')->get();
            return view('admin.building.index', compact('buildings', 'buildingManagers', 'strataManagers'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to execute the cron job.' . $exception->getMessage());
        }
    }

    public function create()
    {
        try {
            $buildingManagers = Manager::where('type', 'Building Manager')->get();
            $strataManagers = Manager::where('type', 'Strata Manager')->get();
            $clients = User::where('role_id', 3)->get();
            $contractors = Contractor::get();
            $managers = Manager::get();
            return view('admin.building.create', compact('clients', 'contractors', 'managers', 'buildingManagers', 'strataManagers'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to execute the cron job.' . $exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $this->buildingRepo->store($request);
            return redirect()->route('buildings.index')->with('success', 'Building created successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $buildingManagers = Manager::where('type', 'Building Manager')->get();
            $strataManagers = Manager::where('type', 'Strata Manager')->get();
            $clients = User::where('role_id', 3)->get();
            $building = $this->buildingRepo->show($id);
            $contractors = Contractor::get();
            $managers = Manager::get();
            return view('admin.building.edit', compact('building', 'clients', 'contractors', 'managers', 'buildingManagers', 'strataManagers'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to execute the cron job.' . $exception->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->buildingRepo->update($request, $id);
            return redirect()->route('buildings.index')->with('success', 'Building updated successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->buildingRepo->destroy($id);
            return redirect()->route('buildings.index')->with('success', 'Building deleted successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to execute the cron job.' . $exception->getMessage());
        }
    }

    public function getContractors(Request $request)
    {
        try {
            $buildingId = $request->input('building_id');

            // $contractors = Building::with('contractor:id,name')->where('id', $buildingId)->get();
            $contractors = Contractor::with('building:id,name')->where('building_id', $buildingId)->get();
            $building = Building::where('id', $buildingId)->first();
            $managers = Manager::where('id', $building->manager_id)->get();
            $buildingManagers = Manager::where('id', $building->building_manager_id)->get();
            $strataManagers = Manager::where('id', $building->strata_manager_id)->get();
            // $managers = Manager::with('building:id,name')->where('building_id', $buildingId)->get();

            return response()->json([
                'contractors' => $contractors,
                'managers' => $managers,
                'buildingManagers' => $buildingManagers,
                'strataManagers' => $strataManagers,
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to execute the cron job.' . $exception->getMessage());
        }
    }
}
