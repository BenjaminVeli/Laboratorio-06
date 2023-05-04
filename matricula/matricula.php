<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Consulta SQL
$sql = 'SELECT matricula_id, curso_id, alumno_id FROM matricula';

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
    <link rel="stylesheet" href="matricula.css">
    <title>Matricula</title>
</head>
<body>
    <div class="contenedor">
    <h1>Matricula</h1>

    <a href="agregar.html">Nuevo matricula</a>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Id curso</td>
                <td>Id alumno</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <?php

            // Recorremos el array con los datos de los alumnos
            while ($matricula = mysqli_fetch_array($resultado)) {
                $matricula_id = $matricula['matricula_id'];
                $curso_id = $matricula['curso_id'];
                $alumno_id = $matricula['alumno_id'];

                echo '<tr>';
                echo '<td>' . $matricula_id . '</td>';
                echo '<td>' . $curso_id . '</td>';
                echo '<td>' . $alumno_id . '</td>';
                echo '<td><a href="#">Editar</a> | <a href="eliminar.php?matricula_id='.$matricula_id.'">Eliminar</a></td>';
            }

            ?>
        </tbody>
    </table>
    </div>
</body>
</html>