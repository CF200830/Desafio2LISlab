<?php
// Versión con arrays anidados
$alumnos = array(
    array(25, 10, 8, 12, 30, 90),    // Básico (índice 0)
    array(15, 5, 4, 8, 15, 25),      // Intermedio (índice 1)
    array(10, 2, 1, 4, 10, 67)       // Avanzado (índice 2)
);

$niveles = array("Básico", "Intermedio", "Avanzado");
$idiomas = array("Inglés", "Francés", "Mandarín", "Ruso", "Portugués", "Japonés");

// Función para mostrar los datos del nivel seleccionado
function mostrarDatos($matriz, $codinivel, $niveles, $idiomas) {
    echo "<table border='1'>";//detallando bordes 
    echo "<tr><th>Idioma</th><th>Número de Alumnos de nivel ".$niveles[$codinivel]."</th></tr>";
    
    // Verificar que el código de nivel sea válido
    if (!isset($matriz[$codinivel])) {//practicamente se verifica la existencia de la clave
        echo "</table>";
        return;
    }
    
    // Obtener los datos del nivel seleccionado
    $alumnosNivel = $matriz[$codinivel];
    
    // Mostrar cada idioma con su cantidad de alumnos
    for($i = 0; $i < count($idiomas); $i++) {
        echo "<tr>";//una columna es de los idiomas 
        // y la otra de la cant de alumnos en ese nivel
        echo "<td><b>".$idiomas[$i]."</b></td>";
        echo "<td>".$alumnosNivel[$i]."</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nivel'])) {
    // Obtener el índice del nivel seleccionado por el usuario
    // array_search busca el valor en el array y devuelve la clave (índice) correspondiente
    $nivelSeleccionado = $_POST['nivel'];//convertimos el valor a un entero
    // array_search devuelve el índice del nivel seleccionado
    $codinivel = array_search($nivelSeleccionado, $niveles);
    
    // Verificar si el nivel existe
    if ($codinivel !== false) {
        // Llamar a la función para mostrar los alumnos
        mostrarDatos($alumnos, $codinivel, $niveles, $idiomas);
    } else {
        echo "<p>Nivel seleccionado no válido.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selección de Nivel</title>
    <link rel="stylesheet" href="estiloB.css">
</head>
<body>
    <h1>Seleccione un nivel</h1>
    <p>Seleccione un nivel para ver la cantidad de alumnos por idioma.</p>
    <form method="post">
       <!-- Crear un menú desplegable para seleccionar el nivel --> 
        <select name="nivel">
            <?php foreach ($niveles as $indice => $nivel): ?>
                <option value="<?= $nivel ?>"><?= $nivel ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Mostrar alumnos</button>
    </form>
    
    <footer>
        <p>Fecha: <?= date('Y-m-d') ?></p>
        <p>Lenguaje Interpretado en el servidor</p>
        <p>Institución: Universidad Don Bosco</p>
    </footer>
</body>
</html>