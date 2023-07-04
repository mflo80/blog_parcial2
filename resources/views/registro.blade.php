@extends('home')

@section('content')
    <br>
    <hr size="1px" color="black">
    <h3>Registro de Usuario</h3>
    
    <form action="login" method="post">
        <div class="container">
            <label for="name">Nombre de usuario:</label>
            <input type="text" name="name" required>
            
            <br><br>
            
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required>
            
            <br><br>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            
            <br><br>

            <label for="password2">Confirmar contraseña:</label>
            <input type="password" name="password2" required>
            
            <br><br>
            
            <button type="submit">Registrar</button>
        </div>
    </form>    
    
    <br>
    <hr size="1px" color="black">
    <br>
    <a href="home">Página Principal</a></p>
@endsection