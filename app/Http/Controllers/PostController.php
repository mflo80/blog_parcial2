<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Post;
use App\Models\PostMuestraPublicidad;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

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
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder->where('titulo', 'like', "%{$request->q}%")
                        ->orWhere('cuerpo', 'like', "%{$request->q}%")
                        ->orWhere('idUsuario', 'like', "%{$request->q}%")
                        ->orWhere('fechaHora', 'like', "%{$request->q}%");
                }
            )
            ->orderBy('post.id','DESC')
            ->simplePaginate(3);

        $meses = $this->ShowMeses();

        return view('sblog', compact(['posts', 'meses']));
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

        $idPost = DB::table('post')
            ->selectRaw("last_insert_id() as id")
            ->value('id');

        if(! $request->idPublicidad == null){
            $post_muestra_publicidad = new PostMuestraPublicidad();
            $post_muestra_publicidad->idPost = $idPost;
            $post_muestra_publicidad->idPublicidad = $request->idPublicidad;
            $post_muestra_publicidad->save();
        }

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

    public function ShowMeses()
    {
        $meses = DB::table('post')
            ->selectRaw("distinct monthname(fechaHora) as mes")->get();

        return $meses;
    }

    public function ShowPostPorMes($id){
        $posts = Post::query()  
            ->whereRaw("month(fechaHora) = $id")
            ->orderBy('post.id','DESC')
            ->simplePaginate(3);

        $meses = $this->ShowMeses();

        return view('sblog', compact(['posts', 'meses']));      
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

        $historial = new Historial();
        $historial->fechaHoraCambio = now();
        $historial->idPost = $request->idPost;
        $historial->idUsuario = $request->idUsuario;
        $historial->save();

        if($request->idPublicidadOld >= 1){
            PostMuestraPublicidadController::Destroy($request->idPost);
        }

        if($request->idPublicidad >= 1) {
            $PostMuestraPublicidad = new PostMuestraPublicidad();
            $PostMuestraPublicidad->idPost = $request->idPost;
            $PostMuestraPublicidad->idPublicidad = $request->idPublicidad;
            $PostMuestraPublicidad->save(); 
        }

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
        
        DB::table('post_muestra_publicidad')->where('idPost', $post->id)->delete();
        DB::table('usuario_califica_post')->where('idPost', $post->id)->delete();
        DB::table('historial')->where('idPost', $post->id)->delete();
        $post->delete();

        return redirect()->action([PostController::class, 'Index'])->with('success','Post eliminado...');
    }
}
