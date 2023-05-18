<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //untuk membuka halaman login
    public function login(){
        if(Auth::check()){
            return redirect ('/');
        }else{
            return view('login');
        }       
    }
    //untuk proses login
    public function authen(Request $request){
        // dd($request->all());
        //Variabel untuk mengatur pesan yang ditampilkan ketika input user tidak sesuai dengan validasi yang ditetapkan
            $customeMessage=[
            'required' =>ucwords(':attribute').' harus diisi', //ketika user tidak mengisi semua field
            'email' =>'Masukkan email yang valid', //ketika field email tidak diisi sesuai dengan format email

            ];
             //untuk memvalidasi inputan user 
            $credential = $request->validate([
                'email' => ['required','email'], //untuk field email
                'password' => ['required'] //untuk field password
            ],$customeMessage);
            //proses autentikasi (cek dokumentasi laravel 10)
            if(Auth::attempt($credential)){
                $request->session()->regenerate();
                //untuk level user
                if(Auth::user()->is_admin==0){//Memerika isi kolom 'is_admin' dari tabel user. Jika isinya adalah '0' maka levelnya adalah user biasa
                    return('Halaman User'); //Pergi ke halaman user
                }elseif(Auth::user()->is_admin==1){ //Memerika isi kolom 'is_admin' dari tabel user. Jika isinya adalah '1' maka levelnya adalah seorang admin
                    return('Halaman Admin');//Pergi ke halaman admin
                }
                // return redirect()->intended('/');
            }else{
                //untuk kembali ke halaman login dengan membawa pesan error
                return back()->withErrors('Email atau Password yang Dimasukkan Salah')->withInput();
            }
    }
    //untuk logout
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
