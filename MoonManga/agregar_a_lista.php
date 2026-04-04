<?php
include 'conexion.php';

$mensaje = ''; // Variable para mostrar mensaje

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['manga_id'])) {
    $manga_id = intval($_POST['manga_id']);

    // Cambiamos a name_manga
    $stmt = $conexion->prepare("SELECT * FROM lista_manga WHERE name_manga = ?");
    if (!$stmt) {
        die("Error en prepare(): " . $conexion->error);
    }
    $stmt->bind_param("i", $manga_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 0) {
        $stmt = $conexion->prepare("INSERT INTO lista_manga (name_manga) VALUES (?)");
        if (!$stmt) {
            die("Error en prepare(): " . $conexion->error);
        }
        $stmt->bind_param("i", $manga_id);
        if ($stmt->execute()) {
            $mensaje = "Manga agregado a la lista";
        } else {
            $mensaje = "Error al agregar manga";
        }
    } else {
        $mensaje = " Este manga ya está en la lista";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agregar a lista</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <?php if ($mensaje): ?>
        <div class="alert alert-info text-center">
            <?= htmlspecialchars($mensaje) ?>
        </div>
    <?php endif; ?>
    <div class="text-center mt-3">
        <a href="javascript:history.back()" class="btn btn-secondary">Volver</a>
    </div>
</div>
</body>
</html>