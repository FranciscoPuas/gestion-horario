<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];

$sql = "INSERT INTO usuarios (nombre, tipo) VALUES ('$nombre', '$tipo')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario creado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>