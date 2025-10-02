<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respuestaJSON(false, 'Método no permitido');
}

$data = json_decode(file_get_contents('php://input'), true);

$required = ['id', 'liga', 'equipo', 'tipoEstadistica', 'valor', 'temporada'];
foreach ($required as $field) {
    if (!isset($data[$field])) {
        respuestaJSON(false, "Campo obligatorio faltante: $field");
    }
}

$id = intval($data['id']);
$liga = sanitizar($data['liga']);
$equipo = sanitizar($data['equipo']);
$tipoEstadistica = sanitizar($data['tipoEstadistica']);
$valor = sanitizar($data['valor']);
$temporada = sanitizar($data['temporada']);
$observaciones = isset($data['observaciones']) ? sanitizar($data['observaciones']) : '';

try {
    $conexion = obtenerConexion();
    
    $sqlCheck = "SELECT id FROM estadisticas WHERE id = ?";
    $stmtCheck = $conexion->prepare($sqlCheck);
    $stmtCheck->bind_param('i', $id);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();
    
    if ($resultCheck->num_rows === 0) {
        respuestaJSON(false, 'Estadística no encontrada');
    }
    
    $sql = "UPDATE estadisticas 
            SET liga = ?, equipo = ?, tipo_estadistica = ?, valor = ?, temporada = ?, 
                observaciones = ?, fecha_actualizacion = NOW()
            WHERE id = ?";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ssssssi', $liga, $equipo, $tipoEstadistica, $valor, $temporada, $observaciones, $id);
    
    if ($stmt->execute()) {
        respuestaJSON(true, 'Estadística actualizada exitosamente');
    } else {
        respuestaJSON(false, 'Error al actualizar la estadística: ' . $stmt->error);
    }
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>