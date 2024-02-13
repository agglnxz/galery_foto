<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class LoginController extends Controller
{
    //
    public function index(){

    return view('auth.login');

    }
     public function login_proses(Request $request){
      $request->validate([
        'email' =>'required',
        'password' => 'required',
      ]);

      $data=[
        'email' => $request->email,
        'password' => $request->password
      ];

      if(Auth::attempt($data)){
        return redirect()->route('dashboard');
      }else{
        return redirect()->back()->with('error','Email atau Password salah!');
      }
    }

    public function logout() {
       Auth::logout();
       return redirect()->back()->with('success','anda telah logout');
    }
}
