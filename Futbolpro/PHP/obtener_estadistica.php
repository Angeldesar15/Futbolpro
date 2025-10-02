<?php
require_once 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    respuestaJSON(false, 'ID de estadística no proporcionado');
}

$estadisticaId = intval($_GET['id']);

try {
    $conexion = obtenerConexion();
    
    $sql = "SELECT e.*, 
                   a.Nombres_Analista, 
                   a.Apellidos_Analista,
                   a.Email_Analista,
                   a.TipoAnalisis_Analista,
                   a.Certificado_Anasllita
            FROM estadisticas e
            INNER JOIN analista a ON e.analista_id = a.Id_Analista
            WHERE e.id = ?";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('i', $estadisticaId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $estadistica = $result->fetch_assoc();
        respuestaJSON(true, 'Estadística encontrada', ['estadistica' => $estadistica]);
    } else {
        respuestaJSON(false, 'Estadística no encontrada');
    }
} catch (Exception $e) {
    respuestaJSON(false, 'Error: ' . $e->getMessage());
}
?>

