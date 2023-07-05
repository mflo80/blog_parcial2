<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function Crear() {
        return view('registro');
    }

    public function Almacenar(Request $request)
    {  
        $request->validate([
            'name' => ['required', 'string', 'max:30', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:4'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
                
        Auth()->logout();
                  
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->to('login')->with('sucess', 'El registro se ha completado correctamente, debe iniciar sessión para continuar...');
     }
}
