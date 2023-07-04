<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class registroController extends Controller
{
    public function registro(Request $request){
        $usuario = new Usuario();

        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->contrasenia = Hash::make($request->contrasenia);
        $usuario->save();

        Auth::login($usuario);
        return redirect(route('login'));
    }
}
