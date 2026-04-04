<?php
include 'conexion.php';

$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if(empty($nombre) || empty($email) || empty($password)){
    die("Todos los campos son obligatorios");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die("El correo no es válido");
}

if(strlen($password) < 6){
    die("La contraseña debe tener al menos 6 caracteres");
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    die("Este correo ya está registrado. Inicie sesión o use otro correo.");
}

// Insertar usuario
$stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $hashedPassword);

if($stmt->execute()){
    echo "Usuario registrado correctamente";
}else{
    echo "Error al registrar usuario";
}
?>