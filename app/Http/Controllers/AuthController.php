<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    //method untuk menampilkan form logiin
    public function showFormLogin()
    {
        return view('auth.login');
    }
    //metod untuk memproses login
    public function Login(Request $request){
        //validasi data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //cek login
        if(auth()->attempt($validatedData)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }
        return back()->with('error','Email atau password salah!');
    }
    //method untuk logout
    public function logout(){
        Auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return Redirect('/login');
        }
}
