<?php

session_start();

include 'conexion.php';


$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if(empty($email) || empty($password)){
    die("Por favor complete todos los campos.");
}


$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if($usuario && password_verify($password, $usuario['password'])){
    $_SESSION['usuario'] = $usuario['nombre']; 
    header("Location: panel.php");
    exit();
} else {
    echo "Datos incorrectos";
}
?>