<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class LoginController extends Controller
{
    //untuk membuka halaman login
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('login');
        }
    }
    //untuk proses login
    public function authen(Request $request)
    {
        //Variabel untuk mengatur pesan yang ditampilkan ketika input user tidak sesuai dengan validasi yang ditetapkan
        $customeMessage = [
            'required' => ucwords(':attribute') . ' harus diisi', //ketika user tidak mengisi semua field
            'email' => 'Masukkan email yang valid', //ketika field email tidak diisi sesuai dengan format email
            'min' => 'Panjang password minimal 8 karakter',
        ];
        //untuk memvalidasi inputan user
        $credential = $request->validate([
            'email' => ['required', 'email'], //untuk field email
            'password' => ['required', 'min:8'] //untuk field password
        ], $customeMessage);
        //proses autentikasi (cek dokumentasi laravel 10)
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            //untuk level user
            if (Auth::user()->is_admin == 0) { //Memerika isi kolom 'is_admin' dari tabel user. Jika isinya adalah '0' maka levelnya adalah user biasa
                return redirect()->route('user.dashboard'); //Pergi ke halaman user
            } elseif (Auth::user()->is_admin == 1) { //Memerika isi kolom 'is_admin' dari tabel user. Jika isinya adalah '1' maka levelnya adalah seorang admin
                return redirect()->route('angkot.index'); //Pergi ke halaman admin
            }
        } elseif (User::where('email', $request->email)) {
            return back()->withErrors('Akun belum terdaftar, silahkan daftar terlebih dahulu');
            // return redirect()->intended('/');
        } else {
            //untuk kembali ke halaman login dengan membawa pesan error
            return back()->withErrors('Email atau Password yang Dimasukkan Salah')->withInput();
        }
    }

    //untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
