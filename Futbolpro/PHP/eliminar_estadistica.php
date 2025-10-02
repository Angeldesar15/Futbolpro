<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respuestaJSON(false, 'Método no permitido');
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || empty($data['id'])) {
    respuestaJSON(false, 'ID de estadística no proporcionado');
}

$estadisticaId = intval($data['id']);

try {
    $conexion = obtenerConexion();
    
    $sql = "DELETE FROM estadisticas WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('i', $estadisticaId);
    
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            respuestaJSON(true, 'Estadística eliminada exitosamente');
        } else {
            respuestaJSON(false, 'Estadística no encontrada');
        }
    } else {
        respuestaJSON(false, 'Error al eliminar la estadística: ' . $stmt->error);
    }
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>