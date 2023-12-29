<?php
$activo = "";
$titulo = "Editor";
require_once "../modelo/Articulo.php";
require_once "../modelo/RepositorioArticulos.php";
require_once "../modelo/conexion.php";
require_once "templates/header.php";

$repo = new RepositorioArticulos($conexion);

$lista = $repo->findAll();

echo "<div class='container'>";
echo "<a class='btn btn-primary' href='form_add.php'>Añadir artículo</a>";
echo "<table class='table'>";
echo "<tr><th>Id</th><th>Título</th><th>Acciones</th></tr>";

foreach ($lista as $articulo) {
    echo "<tr><td>$articulo->id</td>";
    echo "<td>$articulo->titulo</td>";
    echo "<td><a class='btn btn-primary' href='form_update.php?id=$articulo->id'> Modificar </a>";
    echo "<a class='btn btn-primary' href='delete.php?id=$articulo->id'>Borrar</td></tr>";
}

echo "</table></div>";

require_once "templates/footer.php";
