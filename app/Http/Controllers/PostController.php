<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $post;
    
    public function __construct(Post $post){
        $this->post = $post;
    }
    
    public function Index(Request $request)
    {
        $posts = Post::query()
            ->orderBy('id','DESC')
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder->where('titulo', 'like', "%{$request->q}%")
                        ->orWhere('cuerpo', 'like', "%{$request->q}%")
                        ->orWhere('idUsuario', 'like', "%{$request->q}%")
                        ->orWhere('fechaHora', 'like', "%{$request->q}%");
                }
            )
            ->simplePaginate(3);

            return view('sblog', compact('posts'));
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
        $post = new Post();
        $post->titulo = $request->titulo;
        $post->cuerpo = $request->cuerpo;
        $post->idUsuario = $request->idUsuario;
        $post->fechaHora = now();
        $post->save();
        return redirect()->action([PostController::class, 'Index']);
    }

    /**
     * Display the specified resource.
     */
    public function ShowPost($id)
    {
        $post = $this->post->obtenerPostPorId($id);
        if(is_null($post)){
            abort(404);
        }
        return view('sblog-post', ['post' => $post]);
    }

    public function ShowEliminar($id)
    {
        $post = $this->post->obtenerPostPorId($id);
        if(is_null($post)){
            abort(404);
        }
        return view('sblog-eliminar', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Edit($id)
    {
        $post = $this->post->obtenerPostPorId($id);
        if(is_null($post)){
            abort(404);
        }
        if($post->idUsuario != auth()->user()->id){
            return view('sblog-post', ['post' => $post]);
        }
        return view('sblog-editar', compact('post'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function Update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->fill($request->all());
        $post->save();
        return redirect()->action([PostController::class, 'Index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function Destroy($id)
    {
        $post = Post::find($id);
        if(is_null($post)){
            abort(404);
        }
        if($post->idUsuario != auth()->user()->id){
            return view('sblog-post', ['post' => $post]);
        }
        $post->delete();
        return redirect()->action([PostController::class, 'Index'])->with('success','Post eliminado...');
    }
}
