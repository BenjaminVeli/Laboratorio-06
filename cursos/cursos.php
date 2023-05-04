<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Consulta SQL
$sql = 'SELECT curso_id, nombre_curso, creditos FROM curso';

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
    <link rel="stylesheet" href="cursos.css">
    <title>Cursos</title>
</head>
<body>
    <div class="contenedor">
    <h1>Cursos</h1>

    <a href="agregar.html">Nuevo curso</a>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Nombre del curso</td>
                <td>Creditos</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <?php

            // Recorremos el array con los datos de los cursos
            while ($curso = mysqli_fetch_array($resultado)) {
                $curso_id = $curso['curso_id'];
                $nombre_curso = $curso['nombre_curso'];
                $creditos = $curso['creditos'];

                echo '<tr>';
                echo '<td>' . $curso_id . '</td>';
                echo '<td>' . $nombre_curso . '</td>';
                echo '<td>' . $creditos . '</td>';
                echo '<td><a href="editar.php?curso_id='.$curso_id.'">Editar</a>| <a href="eliminar.php?curso_id='.$curso_id.'">Eliminar</a></td>';
                echo '</tr>';
            }

            ?>
        </tbody>
    </table>
    </div>
</body>
</html>