<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $conexion = obtenerConexion();
    
    $sql = "SELECT DISTINCT categoria FROM productos WHERE activo = 1 ORDER BY categoria";
    $result = $conexion->query($sql);
    
    $categorias = [];
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row['categoria'];
    }
    
    respuestaJSON(true, 'Categorías obtenidas', ['categorias' => $categorias]);
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>