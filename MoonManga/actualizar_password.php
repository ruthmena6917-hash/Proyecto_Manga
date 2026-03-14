<?php

include 'conexion.php';

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$token = $_POST['token'];

mysqli_query($conexion,"UPDATE usuarios 
SET password='$password', token=NULL 
WHERE token='$token'");

echo "Contraseña actualizada";

?>