<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
</head>
    <body>
        <h2>═╬ Simple Blog ╬═</h2>
        <div class="container">
            <div class="navbar">
                <tr>
                    @guest
                    <td>
                        ---
                    </td>
                    <td>
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                    </td>
                    <td>
                        ---
                    </td>
                    <td>
                        <a href="{{ route('registro') }}">Registro</a>
                    </td>
                    <td>
                        ---
                    </td>
                    @else
                    <td>
                        <a href="{{ route('logout') }}">Cerrar Sesión</a>
                    </td>
                    @endguest
                </tr>
            </div>
        </div>
        @yield('content')
    </body>
</html>