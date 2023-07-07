<?php
    if( auth()->check() ){
        header("Location: sblog");
        exit();
    }
?>

@extends('home')

@section('content')
    <center>
        <div class="container">
            <h3>Inicio de Sesión</h3>
            <div class="form">
                <form action="sblog-login" method="post">
                    {{ csrf_field() }}
                    <div class="table">
                        <table>
                            <tr>
                                <td>
                                    <label for="email">Email:</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" size="35" required autocomplete="email" autofocus>
                                </td> 
                            </tr>
                            <tr>
                                <td class="divider"><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="password">Contraseña:</label style="margin-left: 30px;">
                                    <input type="password" name="password" size="30" required>
                                </td> 
                            </tr>
                            
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <tr>
                                <td>
                                    <p>¿No tienes cuenta en Simple Blog?
                                    <a href="sblog-registro">Registrar</a></p>
                                </td> 
                            </tr>
                            
                            <tr>
                                <td>
                                    <center><button type="submit">Iniciar Sesión</button></center>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>

            <br>
                <hr size="1px" color="black">
            <br>
  
            @error('message')
                <strong>
                    {{ $message }}
                </strong>
                <br><br>
                    <hr size="1px" color="black">
                <br>
            @enderror

            @if (session('registro_correcto'))
                <strong>
                    {{ session()->get('registro_correcto') }}
                </strong>
                <br><br>
                    <hr size="1px" color="black">
                <br>
            @endif

            <a href="sblog">Página Principal</a></p>
        </div>
    </center>
@endsection

