<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'futbolpro_db');

// Función para obtener conexión
function obtenerConexion() {
    $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conexion->connect_error) {
        die(json_encode([
            'success' => false,
            'message' => 'Error de conexión: ' . $conexion->connect_error
        ]));
    }
    
    $conexion->set_charset('utf8mb4');
    return $conexion;
}

// Función para sanitizar datos
function sanitizar($dato) {
    return htmlspecialchars(strip_tags(trim($dato)), ENT_QUOTES, 'UTF-8');
}

// Función para enviar respuesta JSON
function respuestaJSON($success, $message, $data = null) {
    header('Content-Type: application/json; charset=utf-8');
    $response = [
        'success' => $success,
        'message' => $message
    ];
    
    if ($data !== null) {
        $response = array_merge($response, is_array($data) ? $data : ['data' => $data]);
    }
    
    echo json_encode($response);
    exit;
}

// Función para buscar usuario por email
function buscarUsuarioPorEmail($email) {
    $conexion = obtenerConexion();
    $email = sanitizar($email);
    
    // Buscar en tabla analista
    $sql = "SELECT 'analista' as rol, Id_Analista, TDocumento_Analista, NDocumento_Analista, 
            Nombres_Analista, Apellidos_Analista, Email_Analista, Password_Analista, 
            TipoAnalisis_Analista, Herramientas_Analista, Certificado_Anasllita 
            FROM analista WHERE Email_Analista = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) return $result->fetch_assoc();
    
    // Buscar en tabla proveedor
    $sql = "SELECT 'proveedor' as rol, Id_Proveedor, TDocumento_Proveedor, NDocumento_Proveedor, 
            Nombres_Proveedor, Apellidos_Proveedor, Email_Proveedor, Password_Proveedor, 
            MedioTrasporte_Proveedor, Experiencia_Proveedor, Especialidad_Proveedor 
            FROM proveedor WHERE Email_Proveedor = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) return $result->fetch_assoc();
    
    // Buscar en tabla fan
    $sql = "SELECT 'fan' as rol, Id_Fan, TDocumento_Fan, NDocumento_Fan, Nombres_Fan, 
            Apellidos_Fan, Email_Fan, Password_Fan, EquipoFv_Fan, LigaFv_Fan 
            FROM fan WHERE Email_Fan = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) return $result->fetch_assoc();
    
    return false;
}

// Función para buscar usuario por documento
function buscarUsuarioPorDocumento($numeroDoc) {
    $conexion = obtenerConexion();
    $numeroDoc = sanitizar($numeroDoc);
    
    $tablas = [
        ['tabla' => 'fan', 'campo' => 'NDocumento_Fan'],
        ['tabla' => 'proveedor', 'campo' => 'NDocumento_Proveedor'],
        ['tabla' => 'analista', 'campo' => 'NDocumento_Analista']
    ];
    
    foreach ($tablas as $t) {
        $sql = "SELECT * FROM {$t['tabla']} WHERE {$t['campo']} = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('s', $numeroDoc);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) return true;
    }
    
    return false;
}

// Iniciar sesión
session_start();

function sesionActiva() {
    return isset($_SESSION['usuario']);
}

function cerrarSesion() {
    session_destroy();
}
?>