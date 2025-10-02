
<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respuestaJSON(false, 'Método no permitido');
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || empty($data['id'])) {
    respuestaJSON(false, 'ID de producto no proporcionado');
}

$productoId = intval($data['id']);

try {
    $conexion = obtenerConexion();
    
    $sql = "UPDATE productos SET activo = 0, fecha_actualizacion = NOW() WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('i', $productoId);
    
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            respuestaJSON(true, 'Producto eliminado exitosamente');
        } else {
            respuestaJSON(false, 'Producto no encontrado');
        }
    } else {
        respuestaJSON(false, 'Error al eliminar el producto: ' . $stmt->error);
    }
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>