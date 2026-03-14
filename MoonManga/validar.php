<?php
session_start();
include 'conexion.php';

// Evitar warnings si no vienen datos
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if(empty($email) || empty($password)){
    die("Por favor complete todos los campos.");
}

// Preparar la consulta
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

// Verificar usuario y contraseña
if($usuario && password_verify($password, $usuario['password'])){
    $_SESSION['usuario'] = $usuario['nombre']; 
    header("Location: panel.php");
    exit();
} else {
    echo "Datos incorrectos";
}
?>