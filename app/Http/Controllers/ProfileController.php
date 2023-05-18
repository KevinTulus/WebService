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
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Update the user's username
        $user->name = $validatedData['username'];

        // Update the user's password
        $user->password = Hash::make($validatedData['password']);

        // Save the changes
        $user->save();

        // Update the updated_at timestamp
        $user->touch();

        // Redirect back to the profile page or any other page you desire
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
