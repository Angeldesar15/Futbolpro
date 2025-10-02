<!-- ============================================ -->
<!-- 2. OBTENER UN PRODUCTO (obtener_producto.php) -->
<?php
require_once 'conexion.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode(['success' => false, 'message' => 'ID de producto no proporcionado']);
    exit;
}

$productoId = intval($_GET['id']);

try {
    $sql = "SELECT p.*, 
                   pr.Nombres_Proveedor, 
                   pr.Apellidos_Proveedor,
                   pr.Email_Proveedor,
                   pr.Especialidad_Proveedor
            FROM productos p
            INNER JOIN proveedor pr ON p.proveedor_id = pr.Id_Proveedor
            WHERE p.id = ? AND p.activo = 1";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $productoId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'producto' => $producto
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Producto no encontrado'
        ]);
    }
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}

$conn->close();
?>