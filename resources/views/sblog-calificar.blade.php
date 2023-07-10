@php
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\CalificacionController;
    use App\Http\Controllers\HistorialController;
    use App\Http\Controllers\PostMuestraPublicidadController;
@endphp

@extends('template')

@section('sblog')

   <div>
        <div>
            <h3>
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
                @php
                    $ultimo_cambio = HistorialController::ShowUltimoCambio($post->id)
                @endphp

                @if(! $ultimo_cambio == null)
                    Última modificación: {{ $ultimo_cambio }}
                @endif
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

            <p>
                @php 
                    $publicidad = PostMuestraPublicidadController::ShowPublicidadPorIdPost($post->id)
                @endphp
                
                @if(! $publicidad == null)
                    Publicidad: {{ $publicidad->nombre }} ---» <a href=" {{ $publicidad->URL }} ">{{ $publicidad->URL }}</a>
                @endif
            </p>

            <form action="sblog-calificar-{{$post->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <tr>
                    <td>
                        @if( auth()->check() )
                            <input id="idUsuario" type="hidden" class="form-control" name="idUsuario" value="{{ $idUsuario = auth()->user()->id }}">
                        @endif
                    <td>
                </tr>

                <tr>
                    <td>
                        <input id="idPost" type="hidden" class="form-control" name="idPost" value="{{ $post->id }}" size="10">
                    <td>
                </tr>

                @php 
                    $calificacion = CalificacionController::ShowCalificacionUsuario($idUsuario = auth()->user()->id, $post->id);
                @endphp

                <th>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="1">1</label>
                    </td>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="2">2</label>
                    </td>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="3">3</label>
                    </td>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="4">4</label>
                    </td>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="5">5</label>
                    </td>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="6">6</label>
                    </td>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="7">7</label>
                    </td>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="8">8</label>
                    </td>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="9">9</label>
                    </td>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="10">10</label>
                    </td>
                    <td>
                        <label><input id="puntuacion" type="radio" name="puntuacion" value="0">No Calificar</label>
                    </td>
                    <td>
                        <button type="submit">Enviar</button>
                    </td>
                </th>
        
            <hr size="1px" color="black">
        </div>
            
        <center>
            <a href="javascript:history.back()">Página anterior</a></p>
        </center>
    </div>

@endsection
