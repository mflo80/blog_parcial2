@php
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\CalificacionController;
@endphp

@extends('template')

@section('sblog')

    <div>
        @if(isset($posts))
            @foreach($posts as $post)
                <div>
                    
                    <h3 style="color:darkblue">
                        {{ $post->titulo }}
                    </h3>
                    
                    <p>
                        <strong> {{ $post->cuerpo }} </strong>
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

                    <button>
                        <a href="sblog-post-{{$post->id}}" style="text-decoration:none">Ver Post</a>
                    </button>
                    
                    @if( auth()->check() )
                        @if($post->idUsuario != auth()->user()->id)
                            <button>
                                <a href="sblog-calificar-{{$post->id}}" style="text-decoration:none">Calificar</a>
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
                    @endif

                    <br><br>
                            
                    <hr size="1px" color="black">

                </div>
            @endforeach
        @endif
        
        <center>
            

            <br>

            @include('sblog-mes')

         </center>


        <script>
            function EliminarPost(value) {
                action = confirm(value) ? true : event.preventDefault()
            }
        </script>
    </div>

@endsection
