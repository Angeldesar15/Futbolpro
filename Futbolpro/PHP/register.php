<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respuestaJSON(false, 'Método no permitido');
}

// LEER JSON en lugar de $_POST
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    respuestaJSON(false, 'Datos JSON inválidos');
}

// Obtener datos del JSON
$tipoDocumento = sanitizar($data['tipoDocumento'] ?? '');
$numeroDocumento = sanitizar($data['numeroDocumento'] ?? '');
$nombres = sanitizar($data['nombres'] ?? '');
$apellidos = sanitizar($data['apellidos'] ?? '');
$email = sanitizar($data['email'] ?? '');
$password = $data['password'] ?? '';
$rol = sanitizar($data['rol'] ?? '');

error_log("Datos recibidos - Rol: $rol, Email: $email");

// Validaciones básicas
if (empty($tipoDocumento) || empty($numeroDocumento) || empty($nombres) || 
    empty($apellidos) || empty($email) || empty($password) || empty($rol)) {
    respuestaJSON(false, 'Todos los campos obligatorios deben ser completados');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respuestaJSON(false, 'El formato del correo electrónico no es válido');
}

if (strlen($password) < 6) {
    respuestaJSON(false, 'La contraseña debe tener al menos 6 caracteres');
}

if (buscarUsuarioPorEmail($email)) {
    respuestaJSON(false, 'Ya existe un usuario registrado con ese correo electrónico');
}

if (buscarUsuarioPorDocumento($numeroDocumento)) {
    respuestaJSON(false, 'Ya existe un usuario registrado con ese número de documento');
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$conexion = obtenerConexion();

if (!$conexion) {
    respuestaJSON(false, 'Error de conexión a la base de datos');
}

$rolTabla = strtolower($rol);

try {
    switch ($rolTabla) {
        case 'fan':
            $equipoFavorito = sanitizar($data['equipoFavorito'] ?? '');
            $ligaFavorita = sanitizar($data['ligaFavorita'] ?? '');
            
            $sql = "INSERT INTO fan (TDocumento_Fan, NDocumento_Fan, Nombres_Fan, Apellidos_Fan, 
                    Email_Fan, Password_Fan, EquipoFv_Fan, LigaFv_Fan) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conexion->prepare($sql);
            if (!$stmt) {
                error_log("Error al preparar consulta: " . $conexion->error);
                respuestaJSON(false, 'Error al preparar la consulta: ' . $conexion->error);
            }
            
            $stmt->bind_param("ssssssss", $tipoDocumento, $numeroDocumento, $nombres, $apellidos, 
                             $email, $passwordHash, $equipoFavorito, $ligaFavorita);
            break;
        
        case 'proveedor':
            $medioTrabajo = sanitizar($data['medioTrabajo'] ?? '');
            $experiencia = sanitizar($data['experiencia'] ?? '');
            $especialidad = sanitizar($data['especialidad'] ?? '');
            
            $sql = "INSERT INTO proveedor (TDocumento_Proveedor, NDocumento_Proveedor, Nombres_Proveedor, 
                    Apellidos_Proveedor, Email_Proveedor, Password_Proveedor, MedioTrasporte_Proveedor, 
                    Experiencia_Proveedor, Especialidad_Proveedor) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conexion->prepare($sql);
            if (!$stmt) {
                error_log("Error al preparar consulta: " . $conexion->error);
                respuestaJSON(false, 'Error al preparar la consulta: ' . $conexion->error);
            }
            
            $stmt->bind_param("sssssssss", $tipoDocumento, $numeroDocumento, $nombres, $apellidos, 
                             $email, $passwordHash, $medioTrabajo, $experiencia, $especialidad);
            break;
        
        case 'analista':
            $tipoAnalisis = sanitizar($data['tipoAnalisis'] ?? '');
            $herramientas = sanitizar($data['herramientas'] ?? '');
            $certificaciones = sanitizar($data['certificaciones'] ?? '');
            
            $sql = "INSERT INTO analista (TDocumento_Analista, NDocumento_Analista, Nombres_Analista, 
                    Apellidos_Analista, Email_Analista, Password_Analista, TipoAnalisis_Analista, 
                    Herramientas_Analista, Certificado_Anasllita) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conexion->prepare($sql);
            if (!$stmt) {
                error_log("Error al preparar consulta: " . $conexion->error);
                respuestaJSON(false, 'Error al preparar la consulta: ' . $conexion->error);
            }
            
            $stmt->bind_param("sssssssss", $tipoDocumento, $numeroDocumento, $nombres, $apellidos, 
                             $email, $passwordHash, $tipoAnalisis, $herramientas, $certificaciones);
            break;
        
        default:
            respuestaJSON(false, 'Rol no válido: ' . $rol);
    }

    if ($stmt->execute()) {
        $idInsertado = $conexion->insert_id;
        
        respuestaJSON(true, "Registro exitoso como {$rol}. Ya puedes iniciar sesión.", [
            'id' => $idInsertado,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'email' => $email,
            'rol' => ucfirst($rol)
        ]);
    } else {
        error_log("Error al ejecutar consulta: " . $stmt->error);
        respuestaJSON(false, 'Error al registrar: ' . $stmt->error);
    }
    
} catch (Exception $e) {
    error_log("Excepción en registro: " . $e->getMessage());
    respuestaJSON(false, 'Error en el registro: ' . $e->getMessage());
} finally {
    if ($stmt) {
        $stmt->close();
    }
}
?>