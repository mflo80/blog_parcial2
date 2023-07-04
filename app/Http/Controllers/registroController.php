<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegistroController extends Controller
{
    public function Crear() {
        return view('registro');
    }

    public function Almacenar()
    {  
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
           
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('login');
    }
}
