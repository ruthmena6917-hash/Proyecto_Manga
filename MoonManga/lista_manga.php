<?php
include 'conexion.php';
include 'nav.php';

// Procesar "Eliminar" -> borra el manga de la lista
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $manga_id = intval($_POST['manga_id']);

    $stmt = $conexion->prepare("DELETE FROM lista_manga WHERE id = ?");
    $stmt->bind_param("i", $manga_id);
    $stmt->execute();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Traer todos los mangas
$resultado = $conexion->query("SELECT * FROM lista_manga");
if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Mangas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff; 
            color: #000000; 
        }
        .table-hover tbody tr:hover {
            background-color: #e9ecef; 
        }
        .btn-danger {
            background-color: #000000; 
            color: #ffffff;
            border: 1px solid #000000;
        }
        .btn-danger:hover {
            background-color: #333333;
            border-color: #333333;
        }
        img {
            border-radius: 5px;
            max-height: 100px;
        }
        a.manga-link {
            color: inherit;
            text-decoration: none;
        }
        a.manga-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="espacio">
  <br><br><br>
</div>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Lista de Mangas</h2>

    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Género</th>
                <th>Descripción</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php while($manga = $resultado->fetch_assoc()): ?>
            <tr>
                <td>
                    <a href="capitulos.php?manga_id=<?= $manga['id'] ?>" class="manga-link">
                        <?php if($manga['imagen']): ?>
                            <img src="<?= htmlspecialchars($manga['imagen']) ?>" alt="<?= htmlspecialchars($manga['name_manga']) ?>">
                        <?php else: ?>
                            <span class="text-muted">Sin imagen</span>
                        <?php endif; ?>
                    </a>
                </td>
                <td>
                    <a href="capitulos.php?manga_id=<?= $manga['id'] ?>" class="manga-link">
                        <?= htmlspecialchars($manga['name_manga']) ?>
                    </a>
                </td>
                <td><?= htmlspecialchars($manga['genero']) ?></td>
                <td><?= htmlspecialchars($manga['descripcion']) ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="manga_id" value="<?= $manga['id'] ?>">
                        <button type="submit" name="eliminar" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>