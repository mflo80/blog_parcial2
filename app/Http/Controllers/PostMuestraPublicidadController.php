<?php

namespace App\Http\Controllers;

use App\Models\PostMuestraPublicidad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class PostMuestraPublicidadController extends Controller
{
    use HasFactory;
    protected $post_muestra_publicidad;
    public function __construct(PostMuestraPublicidad $post_muestra_publicidad){
        $this->post_muestra_publicidad = $post_muestra_publicidad;
    }

    public static function ShowPublicidad(){
        return PostMuestraPublicidad::All();
    }

    public static function ShowPublicidadPorIdPost($idPost){
        $idPublicidad = DB::table('post_muestra_publicidad')
            ->select('idPublicidad')
            ->where('idPost', '=', $idPost)
            ->value('idPublicidad');

        $publicidad = PublicidadController::ShowPublicidadPorId($idPublicidad);

        return $publicidad;
    }

    public static function ShowIdPublicidad($idPost){
        $idPublicidad = DB::table('post_muestra_publicidad')
            ->select('idPublicidad')
            ->where('idPost', '=', $idPost)
            ->value('idPublicidad');

        return $idPublicidad;
    }

    public static function Destroy($idPost)
    {
        DB::table('post_muestra_publicidad')
            ->where('idPost', $idPost)
            ->delete();
        return 1;
    }
}
