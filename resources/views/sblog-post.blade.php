@extends('template')

@section('sblog')

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
                Publicado: {{ $post->fechaHora }}
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
                        <a href="sblog-editar-{{$post->id}}" style="text-decoration:none">Editar</a>
                    </button>
                    <button>
                        <a href="sblog-eliminar-{{$post->id}}" style="text-decoration:none" onclick="return EliminarPost('Eliminar Post')">Eliminar</a>
                    </button>
                @endif
                <br><br>
            @endif
                   
            <hr size="1px" color="black">
        </div>
            
        <center>
            <a href="javascript:history.back()">Página anterior</a></p>
        </center>

        <script>
            function EliminarPost(value) {
                action = confirm(value) ? true : event.preventDefault()
            }
        </script>
    </div>

@endsection
