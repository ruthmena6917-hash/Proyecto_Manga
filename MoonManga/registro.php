<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/icon-logo.png">
    <link rel="stylesheet" href="../css/registro.css">
    <title>Inicio de sesión</title>

</head>
<body>

    <div class="box-login">
        <div class="comp-">
            <img src="../img/icon-logo.png" alt="icono de MoonManga" class="ico-logo">
            <h1>Inicia sesión con MoonManga</h1>
        </div>
        <div class="login-web">
            <form action="validar.php" class="web-login" method="POST">
                
                <label for="Username" class="label">Correo electrónico </label>
                <br>
                <input type="text" id="Username" name="email" required>
                <br>
                <label for="Password" class="label">Contraseña </label>
                
                <br>
                <input type="password" id="Password" name="password" required>
                <a href="recuperar.php" class="olv">¿Olvidó su contraseña?</a>
                <br>
                <br>
           
                <button type="submit" class="btn-login">Iniciar sesión</button>
                <br>
                <br>

                <p class="new_" >¿No tienes cuenta? 
                    <a href="login.php">Crear cuenta</a>
                </p>
            </form>
        </div>
    </div>
 
   
</body>
</html>







