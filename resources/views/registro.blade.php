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
            <h3>Registro de Usuario</h3>
            
            <div class="form">
                <form action="/registro" method="post">
                    {{ csrf_field() }}
                    <div class="table">
                        <table>
                            <tr>
                                <td>
                                    <label for="name">Nombre de usuario:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'El usuario ya existe, ingrese otro por favor.' }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="divider"><br></td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label for="email">Email:</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" size="34" required autocomplete="email">
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'El correo electrónico ingresado ya se encuentra registrado, ingrese otro por favor.' }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="divider"><br></td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label for="password">Contraseña:</label>
                                    <input id="password" type="password" class="form-control" name="password" size="29" required autocomplete="new-password">

                                    @error('password')
                                        @if($message=='The password field must be at least 4 characters.')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ 'La contraseña debe tener 4 o más caracteres.' }}</strong>
                                            </span>
                                        @endif
                                        @if($message=='The password field confirmation does not match.')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ 'Las contraseñas no coinciden.' }}</strong>
                                            </span>
                                        @endif
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="divider"><br></td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="password-confirm">Confirme Contraseña:</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" size="18" required autocomplete="new-password">
                                </td>
                            </tr>
                           
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <tr>
                                <td class="divider"><br></td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <center>
                                        <button type="submit">Registrar</button>
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

            <a href="sblog">Página Principal</a></p>
        </div>
    </center>
@endsection