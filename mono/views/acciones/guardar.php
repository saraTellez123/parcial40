<?php

include '../../modelo/driver/conexDB.php';
include '../../controlador/productoController.php';

use app\controllers\productoController;


$result = null; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new productoController();
    $result = $controller->saveNewProducto($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la aplicacion</title>

   
</head>
<body>
    <h1>Resultado de la operación</h1>
    <?php
     if ($result === true) {
        echo "<p>Datos guardados correctamente</p>";
        ?>
        <a href="../menuPrincipal.php">Volver</a>
        <?php
    } else {
        echo '<p>No se pudo guardar los datos</p>';
    }
    ?>

</body>
</html>