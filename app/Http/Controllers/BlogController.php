<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BlogController extends Controller
{
    public function BuscarPost(Request $request)
    {
        $posts = Post::query()
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder->where('titulo', 'like', "%{$request->q}%")
                        ->orWhere('cuerpo', 'like', "%{$request->q}%")
                        ->orWhere('fechaHora', 'like', "%{$request->q}%")
                        ->orWhere('idUsuario', 'like', "%{$request->q}%");
                }
            )
            ->simplePaginate(3);

            return view('sblog', compact('posts'));
    }
}
