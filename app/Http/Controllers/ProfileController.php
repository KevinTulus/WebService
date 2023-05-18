<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Update the user's username
        $user->name = $request['username'];

        // Update the user's password
        $user->password = Hash::make($request['password']);

        // Save the changes
        $user->save();

        // Redirect back to the profile page or any other page you desire
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
