<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $conexion = obtenerConexion();
    
    $liga = isset($_GET['liga']) ? sanitizar($_GET['liga']) : '';
    $equipo = isset($_GET['equipo']) ? sanitizar($_GET['equipo']) : '';
    $analistaId = isset($_GET['analistaId']) ? intval($_GET['analistaId']) : 0;
    $temporada = isset($_GET['temporada']) ? sanitizar($_GET['temporada']) : '';
    
    $sql = "SELECT e.*, 
                   a.Nombres_Analista, 
                   a.Apellidos_Analista,
                   a.Email_Analista,
                   a.TipoAnalisis_Analista
            FROM estadisticas e
            INNER JOIN analista a ON e.analista_id = a.Id_Analista
            WHERE 1=1";
    
    $params = [];
    $types = '';
    
    if (!empty($liga)) {
        $sql .= " AND e.liga = ?";
        $params[] = $liga;
        $types .= 's';
    }
    
    if (!empty($equipo)) {
        $sql .= " AND e.equipo LIKE ?";
        $params[] = "%$equipo%";
        $types .= 's';
    }
    
    if ($analistaId > 0) {
        $sql .= " AND e.analista_id = ?";
        $params[] = $analistaId;
        $types .= 'i';
    }
    
    if (!empty($temporada)) {
        $sql .= " AND e.temporada = ?";
        $params[] = $temporada;
        $types .= 's';
    }
    
    $sql .= " ORDER BY e.fecha_creacion DESC";
    
    $stmt = $conexion->prepare($sql);
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    $estadisticas = [];
    while ($row = $result->fetch_assoc()) {
        $estadisticas[] = $row;
    }
    
    respuestaJSON(true, 'Estadísticas obtenidas', [
        'estadisticas' => $estadisticas,
        'total' => count($estadisticas)
    ]);
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>