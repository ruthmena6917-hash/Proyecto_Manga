<?php

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
       
        <a class="navbar-brand fw-bold fs-4" href="/proyecto_manga/MoonManga/panel.php">MoonManga</a>

        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

       
        <div class="collapse navbar-collapse" id="navbarContenido">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/proyecto_manga/MoonManga/lista_manga.php">Guardados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/proyecto_manga/MoonManga/clasificacion.php">Clasificación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/proyecto_manga/MoonManga/ranking.php">Ranking</a>
                </li>
            </ul>

        
            <form class="d-flex" action="/proyecto_manga/MoonManga/buscar.php" method="GET">
                <input class="form-control me-2" type="search" name="q" placeholder="Buscar manga..." required>
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>