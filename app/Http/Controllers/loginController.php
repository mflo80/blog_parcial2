<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request){
        $credentials = [
            "nombre" => $request->usuario,
            "contrasenia" => $request->contrasenia, 
        ];
        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect()->intended('sblog');
        }else{
            return redirect('login');
        }
    }
}
