<?php
include 'conexion.php';
include 'nav.php';  
// Actualizar puntuación si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['puntuacion'])) {
    $id = intval($_POST['id']);
    $puntuacion = floatval($_POST['puntuacion']);
    $stmt = $conexion->prepare("UPDATE mangas SET puntuacion = ? WHERE id = ?");
    $stmt->bind_param("di", $puntuacion, $id);
    $stmt->execute();
}

// Traer todos los mangas con nombre y puntuación, ordenados por id
$sql = "SELECT id, nombre, puntuacion FROM mangas ORDER BY id ASC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Clasificación de Mangas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include "nav.php"; ?> <!-- Navbar actualizado -->

<div class="container mt-5 pt-5">
    <h1 class="text-center mb-4"> Clasificación de Mangas</h1>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
           
                <th>Nombre</th>
                <th>Puntuación</th>
               
            </tr>
        </thead>
        <tbody>
            <?php while($fila = $resultado->fetch_assoc()): ?>
            <tr>
                 
                <td><?= htmlspecialchars($fila['nombre'] ?? 'Sin nombre') ?></td>
                <td>
                    <form method="POST" class="d-flex justify-content-center align-items-center gap-2">
                        <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                        <input type="number" step="0.1" min="0" max="10" name="puntuacion" 
                               value="<?= $fila['puntuacion'] ?? 0 ?>" class="form-control" style="width:80px;">
                        <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                    </form>
                </td>
                
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>