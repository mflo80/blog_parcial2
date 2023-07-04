<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

    public function Crear(){
        return view('login');
    }
    
    public function Almacenar(Request $request): RedirectResponse
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Correo electrónico y/o contraseña incorrectos, intente de nuevo por favor...'
            ]);
        }
        
        return redirect()->to('sblog');
    }
}
