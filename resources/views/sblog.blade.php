@extends('template')

@section('content')

    <div>
        @foreach($posts as $post)
            <div>
                
                <h3 style="color:darkblue">
                    {{ $post->titulo }}
                </h3>
                
                <p>
                    <strong> {{ $post->cuerpo }} </strong>
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
        
        <center>
            {{  $posts->withQueryString()->links() }}
        </center>

        <script>
            function EliminarPost(value) {
                action = confirm(value) ? true : event.preventDefault()
            }
        </script>
    </div>

@endsection
