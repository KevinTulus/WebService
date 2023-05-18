<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        
        // Validate the form data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);
        
        // Update the username
        $user->name = $validatedData['username'];
        
        // Update the password if provided
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        
        // Save the updated user data
        $user->save();
        
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}