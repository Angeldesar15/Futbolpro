<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $conexion = obtenerConexion();
    
    $sql = "SELECT DISTINCT liga FROM estadisticas ORDER BY liga";
    $result = $conexion->query($sql);
    
    $ligas = [];
    while ($row = $result->fetch_assoc()) {
        $ligas[] = $row['liga'];
    }
    
    respuestaJSON(true, 'Ligas obtenidas', ['ligas' => $ligas]);
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>