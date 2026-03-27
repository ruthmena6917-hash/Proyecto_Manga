
<?php
session_start();

if(!isset($_SESSION['usuario'])){
header("Location: login.php");
}

include "pantalla_Principal/nav.php";

?>

<h2>Hola, <?php echo $_SESSION['usuario']; ?></h2>

<a href="logout.php">Cerrar sesión</a>

