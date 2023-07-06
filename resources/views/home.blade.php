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
                                Bienvenido {{ strtolower(auth()->user()->name) }} ---
                            </td>
                        @endif
                        @if( auth()->check() )
                            <td>
                                <a href="crearPost">Crear Post</a>
                            </td>
                        @endif
                        @if( ! auth()->check() )
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
                        @if( auth()->check() )
                            <td>
                                ---
                            </td>
                            <td>
                                <a href="logout">Cerrar Sesión</a>
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