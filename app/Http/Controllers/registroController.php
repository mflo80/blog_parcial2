<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function Index() {
        if( auth()->check() ) {
            return redirect()->to('sblog'); 
        }
        return view('sblog-registro');
    }

    public function Store(Request $request)
    {  
        $request->validate([
            'name' => ['required', 'string', 'max:30', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:4']
        ]);

        User::create([
            strtolower('name') => $request->name,
            strtolower('email') => $request->email,
            'password' => Hash::make($request->password),
        ]);
                
        Auth()->logout();
                  
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->to('sblog-login')->with('registro_correcto', 'El registro se ha completado correctamente, debe iniciar sesión para continuar...');
     }
}
