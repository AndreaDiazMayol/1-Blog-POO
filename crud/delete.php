<?php
require_once "../modelo/Articulo.php";
require_once "../modelo/RepositorioArticulos.php";
require_once "../modelo/conexion.php";

if (empty($_GET["id"])) {
} else {
    $id = $_GET["id"];

    $repo = new RepositorioArticulos($conexion);

    $articulo = $repo->findById($id);
    if ($articulo) {
        $repo->delete($id);
    } else {
    }
}
$url = $_SERVER['HTTP_REFERER'];
header("Location: " . $url);
