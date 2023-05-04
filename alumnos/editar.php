<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Verificamos si se envió el ID del alumno
if (isset($_GET['alumno_id'])) {
    // Obtenemos el ID del alumno
    $alumno_id = $_GET['alumno_id'];

    // Consulta SQL para obtener los datos del alumno
    $sql = "SELECT * FROM alumno WHERE alumno_id = '$alumno_id'";

    // Ejecutamos la consulta
    $resultado = mysqli_query($conexion, $sql);

    // Verificamos si se encontró el alumno
    if (mysqli_num_rows($resultado) == 1) {
        // Obtenemos los datos del alumno
        $fila = mysqli_fetch_assoc($resultado);
        $nombres = $fila['nombres'];
        $ape_paterno = $fila['ape_paterno'];
        $ape_materno = $fila['ape_materno'];
        // ...
    } else {
        // Si no se encontró el alumno, redireccionamos a la página de lista de alumnos
        header('Location: lista.php');
        exit();
    }
} else {
    // Si no se envió el ID del alumno, redireccionamos a la página de lista de alumnos
    header('Location: lista.php');
    exit();
}

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
    <title>Editar alumno</title>
</head>
<body>
    <div class="contenedor">
    <h1>Editar alumno</h1>

    <form action="actualizar.php" method="POST">
        <table>
            <tbody>
            <input type="hidden" name="alumno_id" value="<?php echo $alumno_id; ?>">
                <tr>
                    <td>Nombres:</td>
                    <td>
                    <input type="text" name="nombres" id="nombres"  required value="<?php echo $nombres; ?>">
                    </td>
                 </tr>
                <tr>
                    <td>Apellido Paterno:</td>
                     <td>
                     <input type="text" name="ape_paterno" id="ape_paterno" required value="<?php echo $ape_paterno; ?>">
                    </td>
                    </tr>
                <tr>
                    <td>Apellido Materno:</td>
                    <td>
                    <input type="text" name="ape_materno" id="ape_materno" required value="<?php echo $ape_materno; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                         <button type="submit" class="boton--agregar">Guardar</button>
                    </td>
                 </tr>
            </tbody>
        </table>
    </form>
    </div>
</body>
</html>
