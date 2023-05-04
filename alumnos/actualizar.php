<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los datos del formulario
$alumno_id = $_POST['alumno_id'];
$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

// Actualizamos los datos del alumno
$sql = "UPDATE alumno SET nombres='$nombres', ape_paterno='$ape_paterno', ape_materno='$ape_materno' WHERE alumno_id=$alumno_id";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    // Si la actualización fue exitosa, redirigimos a la página de alumnos
    header('Location: alumnos.php');
} else {
    // Si hubo un error en la actualización, mostramos un mensaje de error
    echo "Error al actualizar los datos del alumno.";
}

// Cerramos la conexión
desconectar($conexion);

?>
