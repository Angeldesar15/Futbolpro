<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respuestaJSON(false, 'Método no permitido');
}

$data = json_decode(file_get_contents('php://input'), true);

$required = ['id', 'nombre', 'categoria', 'precio', 'descripcion', 'stock'];
foreach ($required as $field) {
    if (!isset($data[$field])) {
        respuestaJSON(false, "Campo obligatorio faltante: $field");
    }
}

$id = intval($data['id']);
$nombre = sanitizar($data['nombre']);
$categoria = sanitizar($data['categoria']);
$precio = floatval($data['precio']);
$descripcion = sanitizar($data['descripcion']);
$stock = intval($data['stock']);
$imagen = isset($data['imagen']) ? sanitizar($data['imagen']) : null;

try {
    $conexion = obtenerConexion();
    
    $sqlCheck = "SELECT id FROM productos WHERE id = ? AND activo = 1";
    $stmtCheck = $conexion->prepare($sqlCheck);
    $stmtCheck->bind_param('i', $id);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();
    
    if ($resultCheck->num_rows === 0) {
        respuestaJSON(false, 'Producto no encontrado');
    }
    
    if ($imagen !== null) {
        $sql = "UPDATE productos 
                SET nombre = ?, categoria = ?, precio = ?, descripcion = ?, imagen = ?, stock = ?,
                    fecha_actualizacion = NOW()
                WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ssdssii', $nombre, $categoria, $precio, $descripcion, $imagen, $stock, $id);
    } else {
        $sql = "UPDATE productos 
                SET nombre = ?, categoria = ?, precio = ?, descripcion = ?, stock = ?,
                    fecha_actualizacion = NOW()
                WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ssdsii', $nombre, $categoria, $precio, $descripcion, $stock, $id);
    }
    
    if ($stmt->execute()) {
        respuestaJSON(true, 'Producto actualizado exitosamente');
    } else {
        respuestaJSON(false, 'Error al actualizar el producto: ' . $stmt->error);
    }
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>