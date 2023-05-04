<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los datos del formulario
$curso_id = $_POST['curso_id'];
$nombre_curso = $_POST['nombre_curso'];
$creditos = $_POST['creditos'];

// Actualizamos los datos del curso
$sql = "UPDATE curso SET nombre_curso='$nombre_curso', creditos='$creditos' WHERE curso_id=$curso_id";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    // Si la actualización fue exitosa, redirigimos a la página de cursos
    header('Location: cursos.php');
} else {
    // Si hubo un error en la actualización, mostramos un mensaje de error
    echo "Error al actualizar los datos del alumno.";
}

// Cerramos la conexión
desconectar($conexion);

?>