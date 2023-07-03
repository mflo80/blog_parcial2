<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <div class="container">

            <h2>SIMPLE BLOG</h2>

            <br>
            
            <label for="name">Nombre de usuario:</label>
            <input type="text" name="name" required>
            
            <br><br>
            
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required>
            
            <br><br>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            
            <br><br>
            
            <button type="submit">Iniciar Sesión</button>
        </div>
    </form>    
</body>
</html>