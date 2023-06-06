<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('manageapi', [
            "title" => "Token",
            "halaman" => "Token User",
        ]);
    }

    /**
     * Create resource.
     */
    public function create()
    {
        auth()->user()->tokens()->delete();
        $user = Auth::user();
        $token = $user->createToken('myapptoken')->plainTextToken;
        return redirect()->back()->with('success', 'Token generated successfully. Your token is: ' . $token); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        auth()->user()->tokens()->delete();
        return redirect()->back()->with('success', 'Token deleted successfully.');
    }
}
