<?php
// Versión combinada: niveles indexados, idiomas asociativos
$alumnos = array(
    array(
        "Inglés" => 25,
        "Francés" => 10,
        "Mandarín" => 8,
        "Ruso" => 12,
        "Portugués" => 30,
        "Japonés" => 90
    ),
    array(
        "Inglés" => 15,
        "Francés" => 5,
        "Mandarín" => 4,
        "Ruso" => 8,
        "Portugués" => 15,
        "Japonés" => 25
    ),
    array(
        "Inglés" => 10,
        "Francés" => 2,
        "Mandarín" => 1,
        "Ruso" => 4,
        "Portugués" => 10,
        "Japonés" => 67
    )
);

$niveles = array("Básico", "Intermedio", "Avanzado");
$idiomas = array_keys($alumnos[0]); // Obtener los idiomas disponibles

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nivelSeleccionado = $_POST['nivel'] ?? 0;
    $idiomaSeleccionado = $_POST['idioma'] ?? 'Inglés';
    
    // Validar que los índices existan
    $nivelSeleccionado = min(max(0, $nivelSeleccionado), count($niveles)-1);
    if (!array_key_exists($idiomaSeleccionado, $alumnos[0])) {
        $idiomaSeleccionado = 'Inglés';
    }
    
    $cantidad = $alumnos[$nivelSeleccionado][$idiomaSeleccionado];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Alumnos</title>
    <link rel="stylesheet" href="estiloC.css">
</head>
<body>
    <h1>Consulta de Alumnos por Nivel e Idioma</h1>
    
    <form method="post">
        <label for="nivel">Nivel:</label>
        <select name="nivel" id="nivel">
            <?php foreach($niveles as $index => $nivel): ?>
                <option value="<?= $index ?>" <?= isset($nivelSeleccionado) && $nivelSeleccionado == $index ? 'selected' : '' ?>>
                    <?= $nivel ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label for="idioma">Idioma:</label>
        <select name="idioma" id="idioma">
            <?php foreach($idiomas as $idioma): ?>
                <option value="<?= $idioma ?>" <?= isset($idiomaSeleccionado) && $idiomaSeleccionado == $idioma ? 'selected' : '' ?>>
                    <?= $idioma ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit">Consultar</button>
    </form>
    
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2>Resultado:</h2>
        <table>
            <tr>
                <th>Nivel</th>
                <th>Idioma</th>
                <th>Alumnos</th>
            </tr>
            <tr>
                <td><?= $niveles[$nivelSeleccionado] ?></td>
                <td><?= $idiomaSeleccionado ?></td>
                <td><?= $cantidad ?></td>
            </tr>
        </table>
    <?php endif; ?>
    
   
</body>
</html>