<!-- ============================================ -->
<!-- 2. guardar_estadistica.php -->
<!-- ============================================ -->
<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respuestaJSON(false, 'Método no permitido');
}

$data = json_decode(file_get_contents('php://input'), true);

// Validar datos obligatorios
$required = ['liga', 'equipo', 'tipoEstadistica', 'valor', 'temporada', 'analistaId'];
foreach ($required as $field) {
    if (!isset($data[$field]) || empty($data[$field])) {
        respuestaJSON(false, "Campo obligatorio faltante: $field");
    }
}

$liga = sanitizar($data['liga']);
$equipo = sanitizar($data['equipo']);
$tipoEstadistica = sanitizar($data['tipoEstadistica']);
$valor = sanitizar($data['valor']);
$temporada = sanitizar($data['temporada']);
$observaciones = isset($data['observaciones']) ? sanitizar($data['observaciones']) : '';
$analistaId = intval($data['analistaId']);

try {
    $conexion = obtenerConexion();
    
    // Verificar que el analista existe
    $sqlCheck = "SELECT Id_Analista FROM analista WHERE Id_Analista = ?";
    $stmtCheck = $conexion->prepare($sqlCheck);
    $stmtCheck->bind_param('i', $analistaId);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();
    
    if ($resultCheck->num_rows === 0) {
        respuestaJSON(false, 'El analista especificado no existe');
    }
    
    $sql = "INSERT INTO estadisticas (liga, equipo, tipo_estadistica, valor, temporada, observaciones, analista_id, fecha_creacion) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ssssssi', $liga, $equipo, $tipoEstadistica, $valor, $temporada, $observaciones, $analistaId);
    
    if ($stmt->execute()) {
        $estadisticaId = $conexion->insert_id;
        respuestaJSON(true, 'Estadística agregada exitosamente', ['estadisticaId' => $estadisticaId]);
    } else {
        respuestaJSON(false, 'Error al guardar la estadística: ' . $stmt->error);
    }
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>