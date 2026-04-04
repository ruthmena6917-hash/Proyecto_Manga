<?php

include 'conexion.php';
include 'nav.php';

$busqueda = $_GET['q'] ?? '';

if (empty($busqueda)) {
    echo "<div class='container mt-5'><h2 class='text-warning'>Por favor ingrese un término de búsqueda</h2></div>";
    exit;
}


$sql = "SELECT * FROM mangas WHERE nombre LIKE ? OR genero LIKE ?";
$stmt = $conexion->prepare($sql);
$like = "%$busqueda%";
$stmt->bind_param("ss", $like, $like);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resultados de búsqueda</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        width: 220px;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.2s;
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .card img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 10px 10px 0 0;
    }
    .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 10px;
    }
    .card-title {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .card-text {
        font-size: 0.85rem;
        margin-bottom: 10px;
        flex-grow: 1;
    }
    .btn-primary {
        background-color: #000000;
        border-color: #000000;
    }
    .btn-primary:hover {
        background-color: #333333;
        border-color: #333333;
    }
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }
</style>
</head>
<body>
<div class="espacio">
      <br><br><br>
    </div>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Resultados de búsqueda: "<?php echo htmlspecialchars($busqueda); ?>"</h2>
    <div class="card-container">

        <?php if ($resultado->num_rows > 0): ?>
            <?php while($row = $resultado->fetch_assoc()): ?>
                <div class="card">
                    <?php if (!empty($row['portada'])): ?>
                        <img src="<?= htmlspecialchars($row['portada']) ?>" alt="<?= htmlspecialchars($row['nombre']) ?>">
                    <?php else: ?>
                        <img src="placeholder.png" alt="Sin portada">
                    <?php endif; ?>
                    <div class="card-body">
                        <div>
                            <h5 class="card-title"><?= htmlspecialchars($row['nombre']) ?></h5>
                            <?php if(!empty($row['genero'])): ?>
                                <p class="card-text"><strong>Género:</strong> <?= htmlspecialchars($row['genero']) ?></p>
                            <?php endif; ?>
                        </div>
                        <form method="POST" action="agregar_a_lista.php">
                            <input type="hidden" name="manga_id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn btn-primary w-100">Agregar a lista</button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <h4>No se encontraron resultados</h4>
            </div>
        <?php endif; ?>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>