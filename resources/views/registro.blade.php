@extends('home')

@section('content')

    <h3>Registro de Usuario</h3>
    
    <form action="/registro" method="post">
        {{ csrf_field() }}
        <div class="container">
            <label for="name">Nombre de usuario:</label>
            <input type="text" class="form-control" id="name" name="name" required autofocus>
            
            <br><br>
            
            <label for="email">Correo electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
            
            <br><br>
            
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>

            <br><br>

            <label for="password_confirmation">Confirme Contraseña:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            
            <br><br>
            
            <button type="submit">Registrar</button>
        </div>
     </form>    
    
    <br>
    <hr size="1px" color="black">
    <br>
    <a href="home">Página Principal</a></p>
@endsection