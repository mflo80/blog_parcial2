<?php

namespace App\Http\Controllers;

use App\Models\UsuarioCalificaPost;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $usuario_califica_post;
    public function __construct(UsuarioCalificaPost $calificacion){
        $this->usuario_califica_post = $calificacion;
    }

     public function Index(Request $request)
    {
        $calificacion = UsuarioCalificaPost::query()
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder->where('idUsuario', 'like', "%{$request->q}%")
                        ->orWhere('idPost', 'like', "%{$request->q}%")
                        ->orWhere('puntuacion', 'like', "%{$request->q}%")
                        ->orWhere('fecha', 'like', "%{$request->q}%");
                }
            );

            return view('sblog-calificacion', compact('calificacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Create()
    {
        return view('sblog-calificacion');
    }

    public static function ShowCalificacionPromedio($idPost){
        $calificacion_promedio = DB::table('usuario_califica_post')
            ->select('*')
            ->where('idPost', '=', $idPost)
            ->avg('puntuacion');

        return $calificacion_promedio;
    }

    public static function ShowCalificacionUsuario($idUsuario, $idPost){
        $calificacion = DB::table('usuario_califica_post')
            ->select('puntuacion')
            ->where('idUsuario', '=', $idUsuario)
            ->where('idPost', '=', $idPost)
            ->value('puntuacion');

        return $calificacion;
    }

    public function Store(Request $request)
    {
        $califica = new UsuarioCalificaPost();
        $califica->idUsuario = $request->idUsuario;
        $califica->idPost = $request->idPost;
        $califica->puntuacion = $request->puntuacion;
        $califica->fecha = now();
        $califica->save();

        return redirect()->action([PostController::class, 'ShowPostCalificar']);
    }

    public function Update(Request $request, $idPost)
    {
        if($request->puntuacion == 0){
            $this->Destroy($idPost);
        }

        if($request->puntuacion >= 0) {
            $califica = DB::table('usuario_califica_post')
            ->where('idPost', '=', $idPost)
            ->get();
            
            $califica->fill($request->all());
            $califica->save();
        }

        return view('sblog-calificar', ['califica' => $califica]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function Destroy($idPost)
    {
        DB::table('usuario_califica_post')->where('idPost', $idPost)->delete();
        
        return redirect()->action([PostController::class, 'ShowPostCalificar'])->with('success','Calificación eliminada...');
    }
}
