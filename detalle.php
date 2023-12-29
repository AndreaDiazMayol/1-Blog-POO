<?php
session_start();
require_once "modelo/Articulo.php";
require_once "modelo/RepositorioArticulos.php";
require_once "modelo/conexion.php";

$id = $_GET["id"];

$repo = new RepositorioArticulos($conexion);
$articulo = $repo->findById($id);
$titulo = $articulo->titulo;
require_once "templates/header.php";


echo $articulo->mostrar();
echo "<a href='index.php' style='margin-left: 80%;'><button type='button' class='btn btn-secondary'>Atras</button></a>
";

require_once "templates/footer.php";
