<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

    public function Index(){
        if( auth()->check() ) {
            return redirect()->to('sblog'); 
        }
        
        return view('sblog-login');
    }
    
    public function Validar(Request $request): RedirectResponse
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Correo electrónico y/o contraseña incorrectos, intente de nuevo por favor...'
            ]);
        }
        
        return redirect()->to('sblog');
    }
}
