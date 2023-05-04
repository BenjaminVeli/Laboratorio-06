<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos el ID del curso
$curso_id = $_GET['curso_id'];

// Consulta SQL para eliminar el alumno
$sql = "DELETE FROM curso WHERE curso_id = $curso_id";

// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// Resetear la numeración del id en la tabla curso
$sql_reset_id = "ALTER TABLE curso AUTO_INCREMENT = 1;";
mysqli_query($conexion, $sql_reset_id);

// Cerramos la conexión
desconectar($conexion);

// Redirigimos de vuelta a la página de cursos
header("Location: cursos.php");
exit();

?>
