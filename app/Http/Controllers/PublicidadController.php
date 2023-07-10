<?php

namespace App\Http\Controllers;

use App\Models\Publicidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicidadController extends Controller
{
    protected $publicidad;
    public function __construct(Publicidad $publicidad){
        $this->publicidad = $publicidad;
    }

    public static function ShowPublicidad(){
        return Publicidad::All();
    }

    public static function ShowPublicidadPorId($idPublicidad){
        $publicidad = DB::table('publicidad')
            ->where('id', '=', $idPublicidad)
            ->first();

        return $publicidad;
    }
}
