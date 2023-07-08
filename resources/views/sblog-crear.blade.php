<?php
    if( ! auth()->check() ){
        header("Location: sblog");
        exit();
    }
?>

@extends('template')

@section('content')
    <center>
        <div class="container">
            <h3>Crear Post</h3>
            
            <div class="form">
                <form action="sblog-crear" method="post">
                    {{ csrf_field() }}
                    <div class="table">
                        <table>
                            <tr>
                                <td>
                                    <label for="titulo">Título:</label>
                                    <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" size="115" maxlength="100" required autocomplete="titulo" autofocus>
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
                                    <textarea name="cuerpo" value="{{ old('cuerpo') }}" rows="19" cols="108" maxlength="2000" autocomplete="cuerpo" style="resize:none"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        @if( auth()->check() )
                                            <input id="idUsuario" type="hidden" class="form-control" name="idUsuario" value="{{ $idUsuario = auth()->user()->id }}" size="10">
                                        @endif
                                    </center>
                                <td>
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
                                        <button type="submit">Publicar</button>
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
    </center>
@endsection