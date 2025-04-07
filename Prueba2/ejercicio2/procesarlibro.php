<?php
// Clase Libro
class Libro {
    public $autor;
    public $titulo;
    public $edicion;
    public $lugar;
    public $editorial;
    public $año;
    public $paginas;
    public $notas;
    public $isbn;

    public function __construct($autor, $titulo, $edicion, $lugar, $editorial, $año, $paginas, $notas, $isbn) {
        $this->autor = $autor;
        $this->titulo = $titulo;
        $this->edicion = $edicion;
        $this->lugar = $lugar;
        $this->editorial = $editorial;
        $this->año = $año;
        $this->paginas = $paginas;
        $this->notas = $notas;
        $this->isbn = $isbn;
    }

     public function mostrarLibro() { 
       return "
        <div class='card mb-3'>
          <div class='card-body'>
            <h5 class='card-title'><strong>{$this->titulo}</strong> {$this->año}</h5>
            <p class='card-text'>
              <strong>Autor:</strong> {$this->autor}<br>
              <strong>Edición:</strong> {$this->edicion}ª<br>
              <strong>Lugar:</strong> {$this->lugar}<br>
              <strong>Editorial:</strong> {$this->editorial}<br>
              <strong>Páginas:</strong> {$this->paginas}<br>
              <strong>ISBN:</strong> {$this->isbn}<br>
              <strong>Notas:</strong> " . (!empty($this->notas) ? $this->notas : "Sin notas") . "
            </p>
          </div>
        </div>";
    }

   
}

// arreglo para almacenar libros
$libros = [];

// recibir datos del formulario y crear objeto
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $libro = new Libro(
        $_POST["autor"],
        $_POST["titulo"],
        $_POST["edicion"],
        $_POST["lugar"],
        $_POST["editorial"],
        $_POST["año"],
        $_POST["paginas"],
        $_POST["notas"],
        $_POST["isbn"]
    );

    // guardar en arreglo
    $libros[] = $libro;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Libros Registrados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container my-5">
    <h2 class="mb-4">Libros Registrados</h2>

    <?php
    if (!empty($libros)) {
        foreach ($libros as $libro) {
            echo $libro->mostrarLibro();
        }
    } else {
        echo "<div class='alert alert-warning'>No se han registrado libros.</div>";
    }
    ?>

    <a href="registro.html" class="btn btn-secondary mt-3">Registrar otro libro</a>
  </div>
</body>
</html>