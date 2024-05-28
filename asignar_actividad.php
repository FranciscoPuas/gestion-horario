<?php
include 'conexion.php';

$usuario_id = $_POST['usuario_id'];
$actividad_id = $_POST['actividad_id'];

$sql = "INSERT INTO usuarios_actividades (usuario_id, actividad_id) VALUES ('$usuario_id', '$actividad_id')";

if ($conn->query($sql) === TRUE) {
    echo "Actividad asignada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>