<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $conexion = obtenerConexion();
    
    $categoria = isset($_GET['categoria']) ? sanitizar($_GET['categoria']) : '';
    $proveedorId = isset($_GET['proveedorId']) ? intval($_GET['proveedorId']) : 0;
    $busqueda = isset($_GET['busqueda']) ? sanitizar($_GET['busqueda']) : '';
    
    $sql = "SELECT p.*, 
                   pr.Nombres_Proveedor, 
                   pr.Apellidos_Proveedor,
                   pr.Email_Proveedor
            FROM productos p
            INNER JOIN proveedor pr ON p.proveedor_id = pr.Id_Proveedor
            WHERE p.activo = 1";
    
    $params = [];
    $types = '';
    
    if (!empty($categoria)) {
        $sql .= " AND p.categoria = ?";
        $params[] = $categoria;
        $types .= 's';
    }
    
    if ($proveedorId > 0) {
        $sql .= " AND p.proveedor_id = ?";
        $params[] = $proveedorId;
        $types .= 'i';
    }
    
    if (!empty($busqueda)) {
        $sql .= " AND (p.nombre LIKE ? OR p.descripcion LIKE ?)";
        $searchTerm = "%$busqueda%";
        $params[] = $searchTerm;
        $params[] = $searchTerm;
        $types .= 'ss';
    }
    
    $sql .= " ORDER BY p.fecha_creacion DESC";
    
    $stmt = $conexion->prepare($sql);
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    $productos = [];
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
    
    respuestaJSON(true, 'Productos obtenidos', [
        'productos' => $productos,
        'total' => count($productos)
    ]);
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>