
     
@extends('home')

@section('content')

    <h3>Inicio de Sesión</h3>

    <form action="/login" method="post">
        {{ csrf_field() }}
        <div class="container">
            <label for="email">Correo Electrónico:</label>
            <input type="text" name="email" required>
            
            <br><br>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <p>¿No tienes cuenta en Simple Blog?
            <a href="registro">Registrar</a></p>
            
            <button type="submit">Iniciar Sesión</button>
        </div>
    </form>

    <br>
        <hr size="1px" color="black">
    <br>
    
    @error('message')
        {{ $message }}
        <br><br>
            <hr size="1px" color="black">
        <br>
    @enderror

    <a href="home">Página Principal</a></p>
@endsection

