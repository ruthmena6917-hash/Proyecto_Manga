<?php
include 'conexion.php';
include 'nav.php';

$manga_id = intval($_GET['manga_id'] ?? 0);

// Traer manga desde lista_manga
$stmt = $conexion->prepare("SELECT * FROM lista_manga WHERE id=?");
$stmt->bind_param("i", $manga_id);
$stmt->execute();
$result = $stmt->get_result();
$manga = $result->fetch_assoc();

if (!$manga) {
    die("Manga no encontrado");
}

// Traer capítulos usando el nombre del manga
$stmt = $conexion->prepare("
    SELECT c.id, c.numero, c.titulo
    FROM manga_capitulos c
    INNER JOIN mangas m ON c.manga_id = m.id
    WHERE m.nombre = ?
    ORDER BY c.numero ASC
");
$stmt->bind_param("s", $manga['name_manga']);
$stmt->execute();
$capitulos = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Capítulos - <?= htmlspecialchars($manga['name_manga']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; color: #000; font-family: Arial, sans-serif; text-align:center; }
        .card { border-radius: 10px; transition: transform 0.3s; cursor:pointer; }
        .card:hover { transform: translateY(-5px); }
        a { text-decoration: none; color: #000; }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4"><?= htmlspecialchars($manga['name_manga']) ?> - Capítulos</h2>
    <div class="row g-4 justify-content-center">
        <?php while($cap = $capitulos->fetch_assoc()): ?>
            <div class="col-md-3">
                <div class="card p-3">
                    <h5>Capítulo <?= $cap['numero'] ?></h5>
                    <p><?= htmlspecialchars($cap['titulo']) ?></p>
                    <a href="ver_capitulo.php?id=<?= $cap['id'] ?>" class="btn btn-primary btn-sm">Ver capítulo</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="mt-4">
        <a href="lista_manga.php" class="btn btn-secondary">← Volver a lista</a>
    </div>
</div>
</body>
</html>