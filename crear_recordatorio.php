<?php
include 'conexion.php';

$actividad_id = $_POST['actividad_id'];
$fecha_recordatorio = $_POST['fecha_recordatorio'];
$hora_recordatorio = $_POST['hora_recordatorio'];

$sql = "INSERT INTO recordatorios (actividad_id, fecha_recordatorio, hora_recordatorio) VALUES ('$actividad_id', '$fecha_recordatorio', '$hora_recordatorio')";

if ($conn->query($sql) === TRUE) {
    echo "Recordatorio creado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>