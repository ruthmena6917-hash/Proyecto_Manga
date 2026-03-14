<?php
$token = $_GET['token'];
?>

<form action="actualizar_password.php" method="POST">

<input type="hidden" name="token" value="<?php echo $token; ?>">

Nueva contraseña
<input type="password" name="password"><br><br>

<button type="submit">Cambiar contraseña</button>

</form>
