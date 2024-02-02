<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'name' =>'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        return Redirect::route('login')->with('success', 'Registrasi berhasil! Silakan login.');

    }
}
