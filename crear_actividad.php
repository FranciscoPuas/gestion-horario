<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$salon = $_POST['salon'];

$sql = "INSERT INTO actividades (nombre, descripcion, fecha, hora, salon) VALUES ('$nombre', '$descripcion', '$fecha', '$hora', '$salon')";

if ($conn->query($sql) === TRUE) {
    echo "Actividad creada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>