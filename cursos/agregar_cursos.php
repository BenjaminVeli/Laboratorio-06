<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los valores del formulario
$nombre_curso = $_POST['nombre_curso'];
$creditos = $_POST['creditos'];

// Formamos la consulta SQL
$sql = "INSERT INTO curso (nombre_curso , creditos) VALUES ('$nombre_curso', '$creditos')";

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
    <title>Nuevo Curso</title>
</head>
<body>
    <h1>Nuevo curso</h1>
    <h3>
        <?php

        if (!$resultado) {
            echo 'El curso no fue registrado';
        }
        else {
            echo 'El curso ha sido registrado';
        }

        ?>
    </h3>
    <a href="cursos.php">Regresar</a>
</body>
</html>