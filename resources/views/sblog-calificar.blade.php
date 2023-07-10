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
                @php
                    $calificacion = CalificacionController::ShowCalificacionPromedio($post->id)
                @endphp

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
                        @if($calificacion == 1)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="1" checked='checked'>1</label>
                        @endif
                        @if($calificacion != 1)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="1">1</label>
                        @endif
                    </td>
                    <td>
                        @if($calificacion == 2)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="2" checked='checked'>2</label>
                        @endif
                        @if($calificacion != 2)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="2">2</label>
                        @endif
                    </td>
                    <td>
                        @if($calificacion == 3)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="3" checked='checked'>3</label>
                        @endif
                        @if($calificacion != 3)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="3">3</label>
                        @endif
                    </td>
                    <td>
                        @if($calificacion == 4)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="4" checked='checked'>4</label>
                        @endif
                        @if($calificacion != 4)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="4">4</label>
                        @endif
                    </td>
                    <td>
                        @if($calificacion == 5)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="5" checked='checked'>5</label>
                        @endif
                        @if($calificacion != 5)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="5">5</label>
                        @endif
                    </td>
                    <td>
                        @if($calificacion == 6)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="6" checked='checked'>6</label>
                        @endif
                        @if($calificacion != 6)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="6">6</label>
                        @endif
                    </td>
                    <td>
                        @if($calificacion == 7)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="7" checked='checked'>7</label>
                        @endif
                        @if($calificacion != 7)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="7">7</label>
                        @endif
                    </td>
                    <td>
                        @if($calificacion == 8)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="8" checked='checked'>8</label>
                        @endif
                        @if($calificacion != 8)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="8">8</label>
                        @endif
                    </td>
                    <td>
                        @if($calificacion == 9)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="9" checked='checked'>9</label>
                        @endif
                        @if($calificacion != 9)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="9">9</label>
                        @endif
                    </td>
                    <td>
                        @if($calificacion == 10)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="10" checked='checked'>10</label>
                        @endif
                        @if($calificacion != 10)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="10">10</label>
                        @endif
                    </td>
                    <td>
                        @if($calificacion == null)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="0" checked='checked'>No Calificar</label>
                        @endif
                        @if($calificacion != null)
                            <label><input id="puntuacion" type="radio" name="puntuacion" value="0">No Calificar</label>
                        @endif
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
