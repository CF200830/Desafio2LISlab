<?php
    //creamos matriz asociativa con claves de tipo string 
    // del nivel de cada una
    $alumnos= [
        "basico" => [25, 10, 8, 12, 30, 90],
        "intermedio" => [15, 5, 4, 8, 15, 25],
        "avanzado" => [10, 2, 1, 4, 10, 67]
            ];
    //creamos matriz con claves de tipo entero
    // del idioma de cada una
    $idiomas=[
        0 => "Inglés",
        1 => "Francés",
        2 => "Mandarín",
        3 => "Ruso",
        4 => "Portugués",
        5 => "Japonés"
    ];
    //funcion que muestra los alumnos por idioma
  
function mostrarAlumnosPorIdioma($matrizAlumnos, $codigoIdioma, $nombreIdioma) {
    // Mostrar el idioma seleccionado
    echo "<h2>Alumnos estudiando $nombreIdioma:</h2>";
    // Recorrer la matriz de alumnos
    //  y mostrar el número de alumnos por nivel
    foreach ($matrizAlumnos as $nivel => $idiomas) {
        // Verificar si el idioma existe en la matriz
        if (isset($idiomas[$codigoIdioma])) {
            // Mostrar el número de alumnos para el nivel
            //  y el idioma seleccionado
            echo "<p>Nivel $nivel: {$idiomas[$codigoIdioma]} alumnos</p>";
        }
    }

}
// Procesar la selección del idioma
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idioma'])) {
   // Obtener el código del idioma seleccionado
    // y convertirlo a entero
    $codigoIdioma = (int)$_POST['idioma'];
   // Verificar si el código del idioma es válido
    // y existe en la matriz de idiomas
    if (array_key_exists($codigoIdioma, $idiomas)) {
       // Llamar a la función para mostrar los alumnos
        mostrarAlumnosPorIdioma($alumnos, $codigoIdioma, $idiomas[$codigoIdioma]);
    } else {
      //mostrar mensaje de error
        echo "<p>Idioma seleccionado no válido.</p>";
    }

}
// HTML para la selección de idioma
?>
<!DOCTYPE html>
<html>
<head>
    <title>Selección de Idioma</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Seleccione un idioma</h1>
    <!--menú de selección de idioma-->
    <form method="post">
        <!-- menú desplegable para seleccionar el idioma -->
        <select name="idioma">
            <!-- recorrer la matriz de idiomas y crear opciones -->
            <?php foreach ($idiomas as $codigo => $nombre): ?>
                <!-- cada opción tiene un valor y un texto visible -->
                <option value="<?= $codigo ?>"><?= $nombre ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Mostrar alumnos</button>
    </form>
</body><footer>
   
    <!-- fecha actual -->
    <p>Fecha: <?= date('Y-m-d') ?></p>
    <p>Lenguaje Interpretado en el servidor</p>
    <p>Institución: Universidad Don Bosco</p>

</footer>
</html>