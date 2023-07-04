<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class RegistroController extends Controller
{
    public function registro()
    {
        return view('registro');
    }

    public function customRegistro(Request $request)
    {  
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|correo|unique:usuario',
            'contrasenia' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);

        return redirect("login")->withSuccess('Debe iniciar sesión');
    }


    public function create(array $data)
    {
      return Usuario::create([
        'nombre' => $data['nombre'],
        'correo' => $data['correo'],
        'contrasenia' => Hash::make($data['contrasenia'])
      ]);
    }    
}
