<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos el ID del alumno
$alumno_id = $_GET['alumno_id'];

// Consulta SQL para eliminar el alumno
$sql = "DELETE FROM alumno WHERE alumno_id = $alumno_id";

// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// Resetear la numeración del id en la tabla alumno
$sql_reset_id = "ALTER TABLE alumno AUTO_INCREMENT = 1;";
mysqli_query($conexion, $sql_reset_id);

// Cerramos la conexión
desconectar($conexion);

// Redirigimos de vuelta a la página de alumnos
header("Location: alumnos.php");
exit();

?>
