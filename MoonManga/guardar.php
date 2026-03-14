<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash ($_POST['password'], PASSWORD_DEFAULT);

$verificar = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email'");

if(mysqli_num_rows($verificar)> 0){
    echo "Este correo ya esta registrado inicie sesion o use otro correo";
    exit(); 
    
    }


    $query = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";

    mysqli_query( $conexio, $query);

    echo "Usuario registrado";
?>