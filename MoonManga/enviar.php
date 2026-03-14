
<?php

include 'conexion.php';

$email = $_POST['email'];

$token = md5(uniqid());

mysqli_query($conexion,"UPDATE usuarios SET token='$token' WHERE email='$email'");

$link = "http://localhost/Proyecto_Manga/nueva_password.php?token=$token";

echo "Link de recuperación:<br>";
echo $link;

?>
