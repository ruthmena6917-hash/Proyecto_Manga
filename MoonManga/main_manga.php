<?php
// mostrar_mangas_cards.php
include 'conexion.php';

$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['manga_id'])) {
    $manga_id = $_POST['manga_id'];

    $stmt = $conexion->prepare("SELECT nombre, genero, estado_emision, portada, descripcion FROM mangas WHERE id = ?");
    $stmt->bind_param("i", $manga_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $manga = $resultado->fetch_assoc();

    if ($manga) {
        $estado_lista = 'leyendo';

        $check = $conexion->prepare("SELECT id FROM lista_manga WHERE name_manga = ?");
        $check->bind_param("s", $manga['nombre']);
        $check->execute();
        $res_check = $check->get_result();

        if ($res_check->num_rows == 0) {
            $insert = $conexion->prepare("INSERT INTO lista_manga (name_manga, genero, estado, descripcion, imagen) VALUES (?, ?, ?, ?, ?)");
            $insert->bind_param(
                "sssss",
                $manga['nombre'],
                $manga['genero'],  
                $estado_lista,
                $manga['descripcion'],
                $manga['portada']
            );
            if ($insert->execute()) {
                $mensaje = "Manga '{$manga['nombre']}' agregado a tu lista con éxito.";
            } else {
                $mensaje = "Error al agregar manga: " . $insert->error;
            }
        } else {
            $mensaje = "El manga '{$manga['nombre']}' ya está en tu lista.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mangas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff; /* blanco */
            color: #000000; /* negro */
        }
        .card {
            background-color: #f8f9fa; /* gris muy claro */
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #000000;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }
        .card-img-top {
            width: 100%;
            height: auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-footer {
            font-size: 0.9rem;
            background-color: #e9ecef; /* gris claro */
            border-top: 1px solid #000000;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .btn-success {
            background-color: #000000; /* negro */
            color: #ffffff; /* texto blanco */
            border: 1px solid #000000;
        }
        .btn-success:hover {
            background-color: #333333;
            border-color: #333333;
        }
        .alert-success {
            background-color: #000000;
            color: #ffffff;
            border-color: #333333;
        }
    </style>
</head>
<body>
<div class="espacio">
    <br><br><br><br>
</div>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Mangas</h2>

    <?php if($mensaje): ?>
        <div class="alert alert-success text-center"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <div class="row g-4">
        <?php
        $resultado = $conexion->query("SELECT * FROM mangas");
        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card h-auto">
                        <img src="<?= htmlspecialchars($fila['portada']) ?>" class="card-img-top" alt="Portada de <?= htmlspecialchars($fila['nombre']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($fila['nombre']) ?></h5>
                            <p class="card-text"><strong>Género:</strong> <?= htmlspecialchars($fila['genero']) ?></p>
                            <p class="card-text"><?= htmlspecialchars($fila['descripcion']) ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <small>Estado: <?= htmlspecialchars($fila['estado_emision']) ?></small>
                            <small>Género: <?= htmlspecialchars($fila['genero']) ?></small>
                           <div class="d-flex gap-2">
                            <form method="POST" style="margin:0;">
                                <input type="hidden" name="manga_id" value="<?= $fila['id'] ?>">
                                <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                            </form>
                           
                        </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>No hay mangas registrados</p>";
        }
        ?>
    </div>
</div>

</body>
</html>