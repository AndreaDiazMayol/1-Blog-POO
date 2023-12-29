<?php
session_start();
$titulo = "Blog";
$activo = "blog";
require_once "modelo/Articulo.php";
require_once "modelo/RepositorioArticulos.php";
require_once "templates/header.php";
require_once "modelo/conexion.php";
$repo = new RepositorioArticulos($conexion);
$lista = $repo->findAll();
$slide = 1;
$num = 0;
echo "<body>
<div id='carrusel' class='carousel ' data-bs-ride='carousel'>
    <div class='carousel-indicators'>";
foreach ($lista as $articulo) {
    if ($articulo->destacado == 1) {
        echo "<button type='button' data-bs-target='#carrusel' data-bs-slide-to='$num' class='active'aria-current='true' aria-label='Slide $slide'></button>";
        $slide++;
        $num++;
    }
}
echo "
</div>
    <div class='carousel-inner'>
";
foreach ($lista as $articulo) {
    if ($articulo->destacado == 1) {
        echo $articulo->mostrarCarrusel();
    }
}
echo "    </div><button class='carousel-control-prev' type='button' data-bs-target='#carrusel'
        data-bs-slide='prev'>
        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
        <span class='visually-hidden'>Anterior</span>
    </button>
    <button class='carousel-control-next' type='button' data-bs-target='#carrusel'
        data-bs-slide='next'>
        <span class='carousel-control-next-icon' aria-hidden='true'></span>
        <span class='visually-hidden'>Siguiente</span>
    </button>
</div>
</body>";

echo "<div class='row row-cols-1 row-cols-md-2 g-4'>";

foreach ($lista as $articulo) {
    echo $articulo->mostrarCard();
}
echo  "</div>";




require_once "templates/footer.php";
