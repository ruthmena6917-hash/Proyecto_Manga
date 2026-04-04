<?php


$conexion = 
mysqli_connect("localhost", "root", "", "manga_login");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


?>
