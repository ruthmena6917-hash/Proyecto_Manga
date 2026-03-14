<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/icon-logo.png">
    <link rel="stylesheet" href="../css/login.css">
    <title>Crea tu cuenta en MoonManga</title>
</head>
<body>


 <div class="box-login">
        <div class="comp-">
       
            <h1>Crea tu cuenta en MoonManga</h1>
        </div>
        <div class="login-web">
            <form action="guardar.php" method="POST">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" required>
                    <label for="name">Nombre</label>
                    <input type="text" name="name" required>
                    <br>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" required>
                    <label class="requisitos_password">La contraseña debe tener al menos 8 caracteres incluyendo letras y números</label>
                    <br><br>
                    <button type="submit" class="btn-login">Entrar</button>

            </form>
            <p class="new_" >¿Ya tienes cuenta? 
                    <a href="registro.php">Iniciar sesión</a>
                </p>
        </div>
    </div>
















     
</body>
</html>


