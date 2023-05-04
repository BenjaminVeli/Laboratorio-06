<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los valores del formulario
$alumno_id = $_POST['alumno_id'];
$curso_id = $_POST['curso_id'];

$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

$nombre_curso = $_POST['nombre_curso'];
$creditos = $_POST['creditos'];

// Formamos la consulta SQL
$sql = "INSERT INTO matricula (nombres, ape_paterno, ape_materno,nombre_curso , creditos,alumno_id,curso_id) VALUES ('$alumno_id''$curso_id''$nombres', '$ape_paterno', '$ape_materno','$nombre_curso', '$creditos')";
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
    <title>Nueva Matricula</title>
</head>
<body>
    <h1>Nueva Matricula</h1>
    <h3>
        <?php

        if (!$resultado) {
            echo 'La matricula no fue registrada';
        }
        else {
            echo 'La matricula no ha sido registrada';
        }

        ?>
    </h3>
    <a href="matricula.php">Regresar</a>
</body>
</html>
