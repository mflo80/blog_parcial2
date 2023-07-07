<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
</head>
    <body>
        <center>
            <h1>S̲i̲m̲p̲l̲e̲ ̲B̲l̲o̲g̲</h1>
        
            <div class="container">
                <div class="navbar">
                    <tr>
                        @if( auth()->check() )
                            <td>
                                <a href="sblog-crear">Crear Post</a>
                            </td>
                            <td>
                                --- {{ strtolower(auth()->user()->name) }} ---
                            </td>
                        @endif
                        @if( ! auth()->check() )
                            <td>
                                <a href="sblog-login">Iniciar Sesión</a>
                            </td>
                            <td>
                                ---
                            </td>
                            <td>
                                <a href="sblog-registro">Registro</a>
                            </td>
                        @endif
                        @if( auth()->check() )
                            <td>
                                <a href="sblog-logout">Cerrar Sesión</a>
                            </td>
                        @endif
                    </tr>
                </div>

                <br>    
                <hr size="1px" color="black">
            </div>
        </center>

        @yield('content')
    
    </body>
</html>