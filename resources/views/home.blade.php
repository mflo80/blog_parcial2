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
                    @if( auth()->check() )
                    <td>
                        ---
                    </td>
                        {{ strtolower(auth()->user()->name) }}
                    @endif
                    @if( ! auth()->check() )
                    <td>
                        ---
                    </td>
                    <td>
                        <a href="login">Iniciar Sesión</a>
                    </td>
                    <td>
                        ---
                    </td>
                    <td>
                        <a href="registro">Registro</a>
                    </td>
                    @endif
                    <td>
                        ---
                    </td>
                    @if( auth()->check() )
                    <td>
                        <a href="logout">Cerrar Sesión</a>
                    </td>
                    <td>
                        ---
                    </td>
                    @endif
                </tr>
            </div>

            <br>    
            <hr size="1px" color="black">
             
        </div>
        @yield('content')
    </body>
</html>