<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect ('/');
        }else{
            return view('login');
        }       
    }

    public function authen(Request $request){
        // dd($request->all());
            $credential = $request->validate([
                'email' => ['required','email'],
                'password' => ['required']
            ]);
            if(Auth::attempt($credential)){
                $request->session()->regenerate();

                return redirect()->intended('/manage');
            }else{
                return back()->with('error','Email atau Password yang Dimasukkan Salah');
            }
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}