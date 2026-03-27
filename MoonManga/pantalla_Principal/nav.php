<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../img/icon-logo.png">
     <link rel="stylesheet" href="http://localhost/Proyecto_Manga/css/nav.css">
</head>
<body>
  <header>
        <div class="box-header">
                 <nav class="heade_P">
                   <a href="panel.php" class="h1"><h1>MoonManga</h1></a>
                        <ul class="menu">
                <li><a href="/MoonManga/pantalla_Principal/nuevos.php">Nuevos</a></li>
                <li><a href="populares.php">Populares</a></li>
                <li class="dropdown">
                    <a href="generos.php">Géneros</a>
                    <ul class="submenu">
                        <li><a href="#">Yaoi +18</a></li>
                        <li><a href="#">Acción</a></li>
                        <li><a href="#">Romance</a></li>
                        <li><a href="#">Aventura</a></li>
                        <li><a href="#">Fantasía</a></li>
                        <li><a href="#">Comedia</a></li>
                        <li><a href="#">Drama</a></li>
                        <li><a href="#">Terror</a></li>
                    </ul>
                </li>
                <li class="icon" id="searchIcon">
                    <a href="#">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                            <path d="M10 2a8 8 0 105.293 14.293l4.707 4.707 1.414-1.414-4.707-4.707A8 8 0 0010 2zm0 2a6 6 0 110 12 6 6 0 010-12z"/>
                        </svg>
                    </a>
                </li>
                <li class="icon">
                
                    <a href="#">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                            <path d="M6 2C5.44772 2 5 2.44772 5 3V22L12 18L19 22V3C19 2.44772 18.5523 2 18 2H6Z"/>
                        </svg>
                    </a>
                </li>
                <li class="icon user-menu">
                    <a href="#">
                        <div 
                        role="button" 
                        aria-label="User menu" 
                        tabindex="0" 
                        aria-expanded="false" 
                        aria-haspopup="menu"
                        class="user-button"
                    >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                            <circle cx="12" cy="8" r="4" fill="white"/>
                            <path d="M4 20c0-4 16-4 16 0v2H4v-2z" fill="white"/>
                        </svg>
                        <svg class="dropdown-arrow" width="24" height="24" viewBox="0 0 24 24" fill="white" style="transition: transform 0.3s;">
                            <path d="M7 10h10l-5 5z"/>
                        </svg>
                    </div>
                    </a>
                   
                </li>
            </ul>

                
        </nav>
    </div>
</header>
 <div id="searchBox" class="search-box">
    <input type="text" id="searchInput" placeholder="Buscar manga..." class="buscador">
</div>

<script>
const icono = document.getElementById("searchIcon");
const caja = document.getElementById("searchBox");

icono.addEventListener("click", function (e) {
    e.preventDefault();

    if (caja.style.display === "block") {
        caja.style.display = "none";
    } else {
        caja.style.display = "block";
    }
});


</script>

</body>
</html>