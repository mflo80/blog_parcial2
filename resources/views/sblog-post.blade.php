@extends('home')

@section('content')

    <div>
        <div>
            <h3>
                {{ $post->titulo }}
            </h3>
            <p>
                {{ $post->cuerpo }}
            </p>
            <p>
                Creado por {{ strtolower(\App\Models\User::all()->where('id', '=', $post->idUsuario)->value('name')) }}
            </p>
            <p>
                Publicado: {{ date('d-M-Y H:m', strtotime($post->fechaHora)) }}
            </p>
            <p>
                @if(\App\Models\UsuarioCalificaPost::all()->where('idPost', '=', $post->id)->avg('puntuacion') > 0)
                @php
                    $puntuacion = \App\Models\UsuarioCalificaPost::all()->where('idPost', '=', $post->id)->avg('puntuacion');
                @endphp
                Puntuación: {{ $puntuacion }}
                @endif

                @if(\App\Models\UsuarioCalificaPost::all()->where('idPost', '=', $post->id)->avg('puntuacion') == null)
                    Puntuación: no calificado
                @endif
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
            
        <center>
            <a href="javascript:history.back()">Página anterior</a></p>
        </center>
    </div>

@endsection
