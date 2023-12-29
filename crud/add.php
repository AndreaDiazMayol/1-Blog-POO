<?php
require_once "../modelo/Articulo.php";
require_once "../modelo/RepositorioArticulos.php";
require_once "../modelo/conexion.php";

if (isset($_POST['submit'])) {
  if (isset($_FILES['imagen']) && $_FILES['imagen']['tmp_name'] != "") {
    $nombreFichero = date("Y-m-d - H-i-s") . "-" . $_FILES['imagen']['name'];
    //Leo la ubicación temporal del archivo para después dejarlo en la carpeta deseada
    $file_loc = $_FILES['imagen']['tmp_name'];
    //movemos el archivo a la carpeta deseada
    move_uploaded_file($file_loc, "../img/" . $nombreFichero);
  } else {
    $nombreFichero = "imagen.jpg";
  }

  $articulo = new Articulo();
  $articulo->setPropiedades($_POST["titulo"], $_POST["contenido"], $nombreFichero, $_POST["miCheckbox"]);
  $articulo->setFecha($_POST["fecha"]);
  if ($_POST["miCheckbox"] == 1) {
    //*Si el checkbox es igual a 1 establecer el valor 1
    $articulo->setDestacado(1);
  } else {
    //*Si el checkbox no es igual a 1 establecer el valor 0
    $articulo->setDestacado(0);
  }
  $repo = new RepositorioArticulos($conexion);
  $repo->save($articulo);

  /*$titulo=$_POST["titulo"];
        $contenido=$_POST["contenido"];
        $fecha=$_POST["fecha"];    
        $imagen=$nombreFichero;
        $consulta=$conexion->query("INSERT INTO articulos (titulo, contenido, fecha, imagen) VALUES
          ('$titulo', '$contenido', '$fecha', '$imagen')"); */

  header("location: form_add.php");
}
