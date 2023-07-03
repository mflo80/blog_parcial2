<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="sblog" method="post">
        <div class="container">

            <h2>SIMPLE BLOG</h2>
            <h3>Inicio de Sesión</h3>

            <br>
            
            <label for="name">Nombre de usuario:</label>
            <input type="text" name="name" required>
            
            <br><br>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            
            <br>

            <p>¿No tienes cuenta en Simple Blog?
            <a href="registro">Registrar</a></p>

            <br>
            
            <button type="submit">Iniciar Sesión</button>
        </div>
    </form>    
</body>
</html>