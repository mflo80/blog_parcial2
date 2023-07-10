@php
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\CalificacionController;
@endphp

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
                Creado por {{ UserController::ShowNombreUsuario($post->idUsuario) }}
            </p>
            <p>
                Publicado: {{ $post->fechaHora }}
            </p>
            <p>
                {{ $calificacion = CalificacionController::ShowCalificacionPromedio($post->id) }}

                @if($calificacion  > 0)
                    Puntuación: {{ $calificacion  }}
                @endif

                @if($calificacion  == null)
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
