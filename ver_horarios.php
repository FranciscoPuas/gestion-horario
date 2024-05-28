<?php
include 'conexion.php';

$sql = "SELECT u.nombre, a.nombre AS actividad, a.fecha, a.hora, a.salon 
        FROM usuarios u
        JOIN usuarios_actividades ua ON u.id = ua.usuario_id
        JOIN actividades a ON ua.actividad_id = a.id
        ORDER BY a.fecha, a.hora";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Usuario</th><th>Actividad</th><th>Fecha</th><th>Hora</th><th>Salón</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['nombre']}</td><td>{$row['actividad']}</td><td>{$row['fecha']}</td><td>{$row['hora']}</td><td>{$row['salon']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay actividades programadas.";
}

$conn->close();