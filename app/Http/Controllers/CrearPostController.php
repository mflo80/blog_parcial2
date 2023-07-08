<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CrearPostController extends Controller
{
    protected $post;

    public function __construct(Post $post){
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     */
    public function Index() {
        return view('sblog-crear');
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
        $request->validate([
            'titulo' => ['required', 'string', 'max:100'],
            'cuerpo' => ['required', 'string', 'max:2000'],
            'idUsuario' => ['required', 'unsignedBigInteger'],
            'fechaHora' => ['required', 'datetime']
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'cuerpo' => $request->cuerpo,
            'idUsuario' => $request->idUsuario,
            'fechaHora' => $request->fechaHora
        ]);

        return redirect()->to('sblog')->with('post_creado', 'Post publicado con éxito...');
    }


    /**
     * Display the specified resource.
     */
    public function Show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function Update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function Destroy(string $id)
    {
        //
    }
}
