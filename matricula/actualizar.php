<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los datos del formulario
$alumno_id = $_POST['alumno_id'];
$matricula_id = $_POST['matricula_id'];
$curso_id = $_POST['curso_id'];

$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

$nombre_curso = $_POST['nombre_curso'];
$creditos = $_POST['creditos'];

// Actualizamos los datos del matricula
$sql = "UPDATE natricula SET nombres='$nombres', ape_paterno='$ape_paterno', ape_materno='$ape_materno' WHERE matricula_id=$matricula_id";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    // Si la actualización fue exitosa, redirigimos a la página de matricula
    header('Location: matricula.php');
} else {
    // Si hubo un error en la actualización, mostramos un mensaje de error
    echo "Error al actualizar los datos de la matricula.";
}

// Cerramos la conexión
desconectar($conexion);

?>