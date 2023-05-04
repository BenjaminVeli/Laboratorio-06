<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Consulta SQL
$sql = 'SELECT alumno_id, nombres, ape_paterno, ape_materno FROM alumno';

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
    <link rel="stylesheet" href="alumnos.css">
    <title>Alumnos</title>
</head>
<body>
    <div class="contenedor">
    <h1>Alumnos</h1>

    <a href="agregar.html">Nuevo alumno</a>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Nombres</td>
                <td>Apellido Paterno</td>
                <td>Apellico Materno</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <?php

            // Recorremos el array con los datos de los alumnos
            while ($alumno = mysqli_fetch_array($resultado)) {
                $alumno_id = $alumno['alumno_id'];
                $nombres = $alumno['nombres'];
                $ape_paterno = $alumno['ape_paterno'];
                $ape_materno = $alumno['ape_materno'];

                echo '<tr>';
                echo '<td>' . $alumno_id . '</td>';
                echo '<td>' . $nombres . '</td>';
                echo '<td>' . $ape_paterno . '</td>';
                echo '<td>' . $ape_materno . '</td>';
                echo '<td><a href="editar.php?alumno_id='.$alumno_id.'">Editar</a> | <a href="eliminar.php?alumno_id='.$alumno_id.'">Eliminar</a></td>';
                echo '</tr>';
            }

            ?>
        </tbody>
    </table>
    </div>
</body>
</html>