@extends('home')

@section('content')

    <div>
        @foreach($posts as $post)
            <div>
                <h3>
                    {{ $post->titulo }}
                </h3>
                <p>
                    {{ $post->cuerpo }}
                </p>
                <p>
                    Autor: {{ strtolower(\App\Models\User::all()->where('id', '=', $post->idUsuario)->value('name')) }}
                </p>
                <p>
                    Creado: {{ date('d-M-Y H:m', strtotime($post->fechaHora)) }}
                </p>
                <p>
                    Puntuación: {{ \App\Models\UsuarioCalificaPost::all()->where('idPost', '=', $post->id)->avg('puntuacion') }}
                </p>
        
                @if( auth()->check() )
                    @if($post->idUsuario != auth()->user()->id)
                        <button>
                            Calificar
                        </button>
                    @endif
                    @if($post->idUsuario == auth()->user()->id)
                        <button>
                            Modificar
                        </button>
                        <button>
                            Eliminar
                        </button>
                    @endif
                    
                    <br><br>
                @endif
                          
                <hr size="1px" color="black">
            </div>
        @endforeach
        
        <center>
            {{  $posts->withQueryString()->links() }}
        </center>
    </div>

@endsection
