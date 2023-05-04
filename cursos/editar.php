<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Verificamos si se envió el ID del curso
if (isset($_GET['curso_id'])) {
    // Obtenemos el ID del curso
    $curso_id = $_GET['curso_id'];

    // Consulta SQL para obtener los datos del curso
    $sql = "SELECT * FROM curso WHERE curso_id = '$curso_id'";

    // Ejecutamos la consulta
    $resultado = mysqli_query($conexion, $sql);

    // Verificamos si se encontró el curso
    if (mysqli_num_rows($resultado) == 1) {
        // Obtenemos los datos del curso
        $fila = mysqli_fetch_assoc($resultado);
        $nombre_curso = $fila['nombre_curso'];
        $creditos = $fila['creditos'];
        // ...
    } else {
        // Si no se encontró el curso, redireccionamos a la página de lista de cursos
        header('Location: lista.php');
        exit();
    }
} else {
    // Si no se envió el ID del curso, redireccionamos a la página de lista de cursos
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
    <link rel="stylesheet" href="cursos.css">
    <title>Editar curso</title>
</head>
<body>
    <div class="contenedor">
    <h1>Editar curso</h1>

    <form action="actualizar.php" method="POST">
        <table>
            <tbody>
            <input type="hidden" name="curso_id" value="<?php echo $curso_id; ?>">
                <tr>
                <td>Nombre del curso:</td>
                    <td>
                    <input type="text" name="nombre_curso" id="nombre_curso"  required value="<?php echo $nombre_curso; ?>">
                    </td>
                 </tr>
                <tr>
                <td>Creditos:</td>
                     <td>
                     <input type="number" name="creditos" id="creditos" required value="<?php echo $creditos; ?>">
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
