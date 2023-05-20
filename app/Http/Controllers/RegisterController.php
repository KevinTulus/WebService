<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisterController extends Controller
{
    //fungsi untuk membuka halaman register
    public function regis(){
        if(Auth::check()){
            return redirect ('/');
        }else{
            return view('register');
        }    
    }
    //fungsi untuk proses registrasi
    public function proses(Request $request){
        //Variabel untuk mengatur pesan yang ditampilkan ketika input user tidak sesuai dengan validasi yang ditetapkan
        $customeMessage=[
            'required' =>ucwords(':attribute').' harus diisi', //ketika user tidak mengisi semua field
            'email' =>'Masukkan email yang valid', //ketika field email tidak diisi sesuai dengan format email
            'min'=>'Panjang Password Minimal 8 karakter',
        ];
        //untuk memvalidasi inputan user 
        $request->validate([
            'nama' => ['required'], //'nama' untuk field name
            'email'=> ['required','email'], //'email' untuk field email
            'password' => ['required','min:8'] //'password' untuk field password
        ], $customeMessage);
        if(User::where('email',$request->email)->exists()){
            return back()->withErrors('Email yang dimasukkan sudah terdaftar');
        }
        //untuk memasukkan inputan ke database menggunakan modal 'User'
        $user = User::create([
            'name' => $request->nama, //'name' adalah nama kolom di database ($request->nama adalah untuk mengambil nilai dari field nama)
            'email' => $request->email, //'email' adalah nama kolom di database ($request->email adalah untuk mengambil nilai dari field email)
            'password' => Hash::make($request->password),//'password' adalah nama kolom di database ($request->password adalah untuk mengambil nilai dari field password)
        ]);

        event(new Registered($user));
        auth()->login($user);

        return redirect()->route('verification.notice');
    }
    //Untuk pergi ke halaman verifikasi
    public function emailverif(){
        return view('verifyemail');

    }
    //Untuk mengecek apakah user sudah mengklik email verifikasi
    public function verif(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/')->with('berhasil','Selamat akun anda telah berhasil dibuat');
    }

    //untuk mengirim ulang email verifikasi
    public function sendEmail(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message','Link Telah Dikirim');
    }


}
