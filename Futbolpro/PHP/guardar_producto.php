<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respuestaJSON(false, 'Método no permitido');
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    respuestaJSON(false, 'Datos JSON inválidos');
}

// Validar datos obligatorios
$required = ['nombre', 'categoria', 'precio', 'descripcion', 'imagen', 'stock', 'proveedorId'];
foreach ($required as $field) {
    if (!isset($data[$field])) {
        respuestaJSON(false, "Campo obligatorio faltante: $field");
    }
}

$nombre = sanitizar($data['nombre']);
$categoria = sanitizar($data['categoria']);
$precio = floatval($data['precio']);
$descripcion = sanitizar($data['descripcion']);
$imagen = sanitizar($data['imagen']);
$stock = intval($data['stock']);
$proveedorId = intval($data['proveedorId']);

try {
    $conexion = obtenerConexion();
    
    // Verificar que el proveedor existe
    $sqlCheck = "SELECT Id_Proveedor FROM proveedor WHERE Id_Proveedor = ?";
    $stmtCheck = $conexion->prepare($sqlCheck);
    $stmtCheck->bind_param('i', $proveedorId);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();
    
    if ($resultCheck->num_rows === 0) {
        respuestaJSON(false, 'El proveedor especificado no existe');
    }
    
    // Insertar producto
    $sql = "INSERT INTO productos (nombre, categoria, precio, descripcion, imagen, stock, proveedor_id, fecha_creacion, activo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), 1)";
    
    $stmt = $conexion->prepare($sql);
    
    if (!$stmt) {
        respuestaJSON(false, 'Error al preparar consulta: ' . $conexion->error);
    }
    
    $stmt->bind_param('ssdssii', $nombre, $categoria, $precio, $descripcion, $imagen, $stock, $proveedorId);
    
    if ($stmt->execute()) {
        $productoId = $conexion->insert_id;
        
        respuestaJSON(true, 'Producto agregado exitosamente', [
            'productoId' => $productoId,
            'nombre' => $nombre,
            'precio' => $precio,
            'stock' => $stock
        ]);
    } else {
        respuestaJSON(false, 'Error al guardar el producto: ' . $stmt->error);
    }
    
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>