<?php
include 'conexion.php';
include 'nav.php';
// Traer mangas ordenados por puntuación descendente
$sql = "SELECT nombre, puntuacion FROM mangas ORDER BY puntuacion DESC LIMIT 10"; // Top 10
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mejores Mangas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .primer-lugar { background-color: #ffd700; font-weight: bold; }
    .segundo-lugar { background-color: #c0c0c0; font-weight: bold; }
    .tercer-lugar { background-color: #cd7f32; font-weight: bold; color: white; }
</style>
</head>
<body>
    <div class="espacio">
  <br><br><br>
</div>
<div class="container mt-5">
    <h1 class="text-center mb-4">Mejores Mangas </h1>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>Posición</th>
                <th>Manga</th>
                <th>Puntuación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                $pos = 1;
                while($fila = $resultado->fetch_assoc()) {
                    $clase = '';
                    if ($pos == 1) $clase = 'primer-lugar';
                    elseif ($pos == 2) $clase = 'segundo-lugar';
                    elseif ($pos == 3) $clase = 'tercer-lugar';

                    echo "<tr class='$clase'>
                            <td>{$pos}</td>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['puntuacion']}</td>
                          </tr>";
                    $pos++;
                }
            } else {
                echo "<tr><td colspan='3'>No hay mangas registrados</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>