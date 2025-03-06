<?php

namespace App\Http\Controllers;

use App\Repositories\BuildingRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    protected $userRepo;

    /**
     * Method __construct
     *
     * @param UserRepository $userRepo [explicite description]
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        try {
            $users = $this->userRepo->all();
            return view('admin.users.index', compact('users'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function create()
    {
        try {
            $roles = Role::where('id', '!=', 1)->get();
            return view('admin.users.create', compact('roles'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $this->userRepo->store($request);
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $roles = Role::where('id', '!=', 1)->get();
            $user = $this->userRepo->show($id);
            return view('admin.users.edit', compact('user', 'roles'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
                // 'password' => ['required', 'string', 'min:8'],
                // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $this->userRepo->update($request, $id);
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->userRepo->destroy($id);
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
