<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;

class ManagersController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        return view('admin.managers.index', compact('managers'));
    }

    public function create(Request $request)
    {
        $type = $request->type;
        $buildingId = $request->buildingId;
        return view('admin.managers.create', compact('type', 'buildingId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            // 'type' => ['required'],
        ]);

        Manager::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'phone_number' => $request->phone_number,
        ]);
        
        if ($request->buildingId) {
            return redirect()->route('buildings.edit', ['id' => $request->buildingId])->with('success', 'Manager created successfully.');
        } else if ($request->buildingType) {
            return redirect()->route('buildings.create')->with('success', 'Manager created successfully.');
        } else {
            return redirect()->route('managers.index')->with('success', 'Manager created successfully.');
        }
    }

    public function edit($id)
    {
        $manager = Manager::find($id);
        return view('admin.managers.edit', compact('manager'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'type' => ['required'],
        ]);

        $manager = Manager::find($id);
        $manager->update([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('managers.index')->with('success', 'Manager updated successfully.');
    }

    public function destroy($id)
    {
        $manager = Manager::find($id);
        $manager->delete();

        return redirect()->route('managers.index')->with('success', 'Manager deleted successfully.');
    }
}
