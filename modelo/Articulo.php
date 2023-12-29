<?php
class Articulo
{
    public $id;
    public $titulo;
    public $contenido;
    public $imagen;
    public $fecha;
    public $id_tema;
    public $destacado;

    public function __construct()
    {
        $this->fecha = date('Y-m-d');
    }

    public function setPropiedades($tit, $cont, $img, $des)
    {
        $this->titulo = $tit;
        $this->contenido = $cont;
        $this->imagen = $img;
        $this->destacado = $des;
    }

    public function mostrar()
    {
        echo "
        <div class='container mt-4'>
            <div class='row'>
                <div class='col-md-8 offset-md-2'>
                    <img src='img/$this->imagen' class='d-block mx-auto img-fluid' style='max-height: 300px;'>
                    <h1 class='mt-4' style='text-align:center;'>$this->titulo</h1>
                    <p class='mt-5' style='text-align: justify;'>$this->contenido</p>
                    <p class='text-muted' style='text-align: right;'>$this->fecha</p>
                 </div>
            </div>
        </div>";
    }
    public function mostrarCarrusel()
    {
        echo "
        <div class='carousel-item active' style='height:300px; width:100%;background-color:black;'>
            <img src='img/" . $this->imagen . "' class='d-block img-fluid'  style='height:300px; width:300px;margin-left:200px; margin-right: auto;' alt='...'>
            <div class='carousel-caption d-none d-md-block'>
                <h5 style='margin-bottom: 20px; margin-left: 300px; text-align: left'>" . $this->titulo . "</h5>
                <p style='margin-bottom: 100px; margin-left: 300px; text-align: left'>" . $this->extractoContenido() . "</p>
                <a href='detalle.php?id=$this->id' style='margin-left: 80%;'><button type='button' class='btn btn-secondary'>Continuar Leyendo</button></a>
            </div> 
        </div>
       ";
    }
    public function mostrarCard()
    {
        echo "<div class='col' style='margin-top:40px;'>
                <div class='card mb-3 mx-2' style='max-width: auto;'>
                    <div class='row g-0'>
                    <div class='col-md-4'>
                        <img src='img/" . $this->imagen . "' class='img-fluid rounded-start' style='height: 250px; margin-left: 30px; margin-top: 10px;margin-block: 10px'>
                    </div>
                    <div class='col-md-8'>
                    <div class='card-body' style=' margin-left: 20px;'>
                        <h5 class='card-title'>" . $this->titulo . "</h5>
                        <p class='card-text'>" . $this->extractoContenido() . "</p>
                        <p class='card-text'><small class='text-muted'>9m</small></p>";
        if ($this->destacado == 1) {
            echo "<i class='bi bi-star' ></i>";
        }
        echo " <a href='detalle.php?id=" . $this->id . "'><button type='button' class='btn btn-secondary'>Continuar Leyendo</button></a>
        </div></div></div></div></div>";
    }

    private function extractoContenido()
    {
        $contenido = explode(" ", $this->contenido);
        $aux = "";
        if (count($contenido) > 1 && count($contenido) > 12) {
            for ($i = 0; $i < 12; $i++) {
                $aux .= $contenido[$i] . " ";
            }
        } elseif (count($contenido) > 1 && count($contenido) < 12) {
            for ($i = 0; $i < count($contenido); $i++) {
                $aux .= $contenido[$i] . " ";
            }
        } else {
            $aux .= $contenido[0];
        }
        return $aux .= "...";
    }

    public function mostrarMini()
    {
        return $this->titulo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function setImagen($Imagen)
    {
        $this->imagen = $Imagen;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getDestacado()
    {
        return $this->destacado;
    }
    public function setDestacado($destacado)
    {
        $this->destacado = $destacado;
    }
}
