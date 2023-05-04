<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos el ID del matricula
$matricula_id = $_GET['matricula_id'];

// Consulta SQL para eliminar el alumno
$sql = "DELETE FROM matricula WHERE matricula_id = $matricula_id";

// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// Resetear la numeración del id en la tabla matricula
$sql_reset_id = "ALTER TABLE matricula AUTO_INCREMENT = 1;";
mysqli_query($conexion, $sql_reset_id);

// Cerramos la conexión
desconectar($conexion);

// Redirigimos de vuelta a la página de matricula
header("Location: matricula.php");
exit();

?>
