@extends('home')

@section('content')

    <h3>Registro de Usuario</h3>
    
    <form action="/registro" method="post">
        {{ csrf_field() }}
        <div class="container">
            <label for="name">Nombre de usuario:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ 'El usuario ya existe, ingrese otro por favor.' }}</strong>
                </span>
            @enderror

            <br><br>
            
            <label for="email">Correo electrónico:</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
            
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ 'El correo electrónico ingresado ya se encuentra registrado, ingrese otro por favor.' }}</strong>
                </span>
            @enderror

            <br><br>
            
            <label for="password">Contraseña:</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

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

            <br><br>

            <label for="password-confirm">Confirme Contraseña:</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

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