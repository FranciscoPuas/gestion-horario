<?php
include 'conexion.php';

$usuarios = [];
$sqlUsuarios = "SELECT id, nombre FROM usuarios";
$resultUsuarios = $conn->query($sqlUsuarios);

if ($resultUsuarios->num_rows > 0) {
    while ($row = $resultUsuarios->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

$actividades = [];
$sqlActividades = "SELECT id, nombre FROM actividades";
$resultActividades = $conn->query($sqlActividades);

if ($resultActividades->num_rows > 0) {
    while ($row = $resultActividades->fetch_assoc()) {
        $actividades[] = $row;
    }
}

echo json_encode(['usuarios' => $usuarios, 'actividades' => $actividades]);

$conn->close();
?>