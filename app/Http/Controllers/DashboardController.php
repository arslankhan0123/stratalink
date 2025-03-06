<?php

namespace App\Http\Controllers;

use App\Repositories\BuildingRepository;
use App\Repositories\DashboardRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $dashboardRepo, $buildingRepo;

    /**
     * Method __construct
     *
     * @param ContractorRepository $contractorRepo [explicite description]
     *
     * @return void
     */
    public function __construct(DashboardRepository $dashboardRepo, BuildingRepository $buildingRepo)
    {
        $this->dashboardRepo = $dashboardRepo;
        $this->buildingRepo = $buildingRepo;
    }

    /**
     * Method index
     *
     * @return void
     */
    public function index(Request $request)
    {
        try {
            if (Auth::user()->role()->first()->name === 'admin') {
                $data = $this->dashboardRepo->getData($request);
                return view('dashboard', compact('data'));
            } else if (Auth::user()->role()->first()->name == 'client') {
                $data = $this->buildingRepo->all($request);
                return view('sec_dashboard', compact('data'));
            } else if (Auth::user()->role()->first()->name == 'staff') {
                $data = $this->buildingRepo->all($request);
                return view('sec_dashboard', compact('data'));
            }
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed.' . $exception->getMessage());
        }
    }

    public function staff(Request $request)
    {
        try {
            $data = $this->dashboardRepo->getStaffData($request);
            return view('dashboard', compact('data'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed.' . $exception->getMessage());
        }
    }
}
