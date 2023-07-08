<?php

namespace App\Http\Controllers;

use App\Models\UsuarioCalificaPost;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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
        return view('sblog-crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Store(Request $request)
    {
        $calificacion = new UsuarioCalificaPost($request->all());
        $calificacion->save();
        return redirect()->action([PostController::class, 'Index']);
    }

    /**
     * Display the specified resource.
     */
    public function Show($id)
    {
        $calificacion = $this->usuario_califica_post->obtenerPostPorId($id);
        return view('sblog-post', ['post' => $calificacion]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Edit($id)
    {
        $post = $this->usuario_califica_post->obtenerPostPorId($id);
        return view('sblog-modificar', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function Update(Request $request, $id)
    {
        $post = UsuarioCalificaPost::find($id);
        $post->fill($request->all());
        $post->save();
        return redirect()->action([PostController::class, 'Index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function Destroy($id)
    {
        $post = UsuarioCalificaPost::find($id);
        $post->delete();
        return redirect()->action([PostController::class, 'Index']);
    }
}
