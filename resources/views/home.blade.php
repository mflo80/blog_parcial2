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
                    <td>
                        ---
                    </td>
                    
                    <td>
                        <a href="logout">Cerrar Sesión</a>
                    </td>
                    
                </tr>
            </div>
        </div>
        @yield('content')
    </body>
</html>