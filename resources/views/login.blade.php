@extends('home')

@section('content')
    <br>    
    <hr size="1px" color="black">
    <h3>Inicio de Sesión</h3>

    <form action="sblog" method="post">
        <div class="container">
            <label for="name">Nombre de usuario:</label>
            <input type="text" name="name" required>
            
            <br><br>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <p>¿No tienes cuenta en Simple Blog?
            <a href="registro">Registrar</a></p>
            
            <button type="submit">Iniciar Sesión</button>
        </div>
    </form>

    <br>
    <hr size="1px" color="black">
    <br>
    <a href="home">Página Principal</a></p>
@endsection

