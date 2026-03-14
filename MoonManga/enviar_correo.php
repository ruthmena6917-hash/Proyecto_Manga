<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

include 'conexion.php';


$email = $_POST['email'];

$token = bin2hex(random_bytes(16));

mysqli_query($conexion, "UPDATE usuarios SET token='$token' WHERE email='$email'");

$mail = new PHPMailer(true);

try {

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'evaestudia255@gmail.com';
$mail->Password = 'kcdh xwep ohfl wkrw';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('evaestudia255@gmail.com', 'MoonManga');
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = 'Recuperar contraseña';

$link = "http://localhost/Proyecto_Manga/nueva_password.php?token=$token";

$mail->Body = "Hola, haz clic en el siguiente enlace para cambiar tu contraseña: <br><a href='$link'>$link</a>";

$mail->send();

echo "Correo enviado";

} catch (Exception $e) {
echo "Error: {$mail->ErrorInfo}";
}
?>