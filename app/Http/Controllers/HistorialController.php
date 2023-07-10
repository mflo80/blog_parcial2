<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    protected $historial;
    public function __construct(Historial $historial){
        $this->historial = $historial;
    }
    /**
     * Display a listing of the resource.
     */

    public static function ShowUltimoCambio($idPost){

        $ultimo_cambio = DB::table('historial')
                ->select('fechaHoraCambio')
                ->where('idPost','=',$idPost)
                ->orderBy('fechaHoraCambio', 'DESC')
                ->limit(1)
                ->value('fechaHoraCambio');

        return $ultimo_cambio;
    }
}