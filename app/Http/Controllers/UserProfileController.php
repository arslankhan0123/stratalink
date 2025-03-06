<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {
        // Assuming you have a User model with a method like this:
        $userData = Auth::user();
        return view('admin.users.profile', compact('userData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
        ]);

        // Update the user's data
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        if ($request->password) {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('user.profile')->with('success', 'User profile updated successfully.');
    }
}
