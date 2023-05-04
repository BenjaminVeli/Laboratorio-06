<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los valores del formulario
$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

// Formamos la consulta SQL
$sql = "INSERT INTO alumno (nombres, ape_paterno, ape_materno) VALUES ('$nombres', '$ape_paterno', '$ape_materno')";

// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Alumno</title>
</head>
<body>
    <h1>Nuevo alumno</h1>
    <h3>
        <?php

        if (!$resultado) {
            echo 'El alumno no fue registrado';
        }
        else {
            echo 'El alumno ha sido registrado';
        }

        ?>
    </h3>
    <a href="alumnos.php">Regresar</a>
</body>
</html>