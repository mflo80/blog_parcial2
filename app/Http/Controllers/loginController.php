<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(){
        return view('login');
    }
    
    public function customLogin(Request $request){
        {
            $request->validate([
                'correo' => 'required',
                'contrasenia' => 'required',
            ]);
    
            $credentials = $request->only('nombre', 'contrasenia');
    
            if (Auth::attempt($credentials)) {
                return redirect()->intended('home')
                            ->withSuccess('Signed in');
            }
    
            return redirect("login")->withSuccess('Inicio de sesión no válido');
        }
    }
}
