@php
    use App\Http\Controllers\PublicidadController;
    use App\Http\Controllers\PostMuestraPublicidadController;
@endphp

@extends('template')

@section('sblog')
    <center>
        <div class="container">
            <h3>Modificar Post</h3>
            
            <div class="form">
                <form action="sblog-editar-{{$post->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="table">
                        <table>
                            <tr>
                                <td>
                                    <label for="titulo">Título:</label>
                                    <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $post->titulo }}" size="105" maxlength="100" required autocomplete="titulo">
                                </td>
                            </tr>

                            <tr>
                                <td 
                                    class="divider">
                                    <br>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <textarea name="cuerpo" value="{{ old('cuerpo') }}" rows="22" cols="113" maxlength="2000" autocomplete="cuerpo" style="resize:none">{{$post->cuerpo}}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input id="idPost" type="hidden" class="form-control" name="idPost" value="{{ $post->id }}" size="10">
                                <td>
                            </tr>

                            <tr>
                                <td>
                                    @if( auth()->check() )
                                        <input id="idUsuario" type="hidden" class="form-control" name="idUsuario" value="{{ $idUsuario = auth()->user()->id }}">
                                    @endif
                                <td>
                            </tr>

                            @php 
                                $idPublicidad = PostMuestraPublicidadController::ShowIdPublicidad($post->id);
                                $idPublicidadOld = $idPublicidad;
                            @endphp

                            

                            <tr>
                                <td>
                                    <input id="idPublicidadOld" type="hidden" class="form-control" name="idPublicidadOld" value="{{ $idPublicidadOld }}">
                                <td>
                            </tr>

                            <tr>
                                <td 
                                    class="divider">
                                </td>
                            </tr>
                            
                            @php
                                $publicidad = PublicidadController::ShowPublicidad();
                            @endphp

                            <tr>
                                <td>
                                    Publicidad
                                </td>
                            </tr>
                            
                            @foreach ($publicidad as $publicidad)
                                <tr>
                                    <td>
                                        @if($idPublicidad == $publicidad->id)
                                            @php $opcion = "checked" @endphp
                                            <label> <input id="idPublicidad" type="radio" name="idPublicidad" value="{{ $publicidad->id }}" checked="{{ $opcion }}"> {{ $publicidad->nombre }} -- Fecha Expiración: {{ $publicidad->fechaExpiracion }}</label>
                                        @endif         
                                        
                                        @if($idPublicidad != $publicidad->id)
                                            <label> <input id="idPublicidad" type="radio" name="idPublicidad" value="{{ $publicidad->id }}"> {{ $publicidad->nombre }} -- Fecha Expiración: {{ $publicidad->fechaExpiracion }}</label>
                                        @endif       
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td>
                                    @if($idPublicidad == null)
                                        @php 
                                            $opcion = "checked"
                                        @endphp
                                        <label> <input id="idPublicidad" type="radio" name="idPublicidad" value="0" checked="{{$opcion}}"> Sin Publicidad </label>
                                    @endif

                                    @if($idPublicidad != null)
                                        <label> <input id="idPublicidad" type="radio" name="idPublicidad" value="0"> Sin Publicidad </label>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td 
                                    class="divider">
                                    <br>
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <center>
                                        <button type="submit">Modificar</button>
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>    
            </div>

            <br>
                <hr size="1px" color="black">
            <br>
        </div>

        <a href="javascript:history.back()">Página anterior</a></p>
    </center>
@endsection