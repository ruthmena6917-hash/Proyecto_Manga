
<?php
session_start();

if(!isset($_SESSION['usuario'])){
header("Location: registro.php");
}

include "nav.php";
include "main_manga.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php">Cerrar sesión?</a>
</body>
</html>


