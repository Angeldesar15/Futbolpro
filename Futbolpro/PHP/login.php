<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    
    if (!$data) {
        respuestaJSON(false, 'Datos JSON inválidos');
    }
    
    $email = sanitizar($data['email'] ?? '');
    $password = $data['password'] ?? '';

    if (empty($email)) {
        respuestaJSON(false, 'Debes proporcionar un correo electrónico');
    }

    if (empty($password)) {
        respuestaJSON(false, 'Debes proporcionar una contraseña');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        respuestaJSON(false, 'El formato del correo electrónico no es válido');
    }

    $usuario = buscarUsuarioPorEmail($email);

    if (!$usuario) {
        respuestaJSON(false, 'Correo o contraseña incorrectos');
    }

    $rol = strtolower($usuario['rol']);
    $rolCapitalizado = ucfirst($rol);
    $passwordField = "Password_" . $rolCapitalizado;
    $idField = "Id_" . $rolCapitalizado;
    
    if (!isset($usuario[$passwordField])) {
        respuestaJSON(false, 'Error en la configuración del usuario');
    }
    
    if (!password_verify($password, $usuario[$passwordField])) {
        respuestaJSON(false, 'Correo o contraseña incorrectos');
    }

    $datosUsuario = [
        'id' => $usuario[$idField] ?? null,
        'tipoDocumento' => $usuario["TDocumento_" . $rolCapitalizado] ?? '',
        'numeroDocumento' => $usuario["NDocumento_" . $rolCapitalizado] ?? '',
        'nombres' => $usuario["Nombres_" . $rolCapitalizado] ?? '',
        'apellidos' => $usuario["Apellidos_" . $rolCapitalizado] ?? '',
        'email' => $usuario["Email_" . $rolCapitalizado] ?? '',
        'rol' => $rolCapitalizado
    ];

    switch ($rol) {
        case 'fan':
            $datosUsuario['equipoFavorito'] = $usuario['EquipoFv_Fan'] ?? '';
            $datosUsuario['ligaFavorita'] = $usuario['LigaFv_Fan'] ?? '';
            break;
        
        case 'proveedor':
            $datosUsuario['medioTrabajo'] = $usuario['MedioTrasporte_Proveedor'] ?? '';
            $datosUsuario['experiencia'] = $usuario['Experiencia_Proveedor'] ?? '';
            $datosUsuario['especialidad'] = $usuario['Especialidad_Proveedor'] ?? '';
            break;
        
        case 'analista':
            $datosUsuario['tipoAnalisis'] = $usuario['TipoAnalisis_Analista'] ?? '';
            $datosUsuario['herramientas'] = $usuario['Herramientas_Analista'] ?? '';
            $datosUsuario['certificaciones'] = $usuario['Certificado_Anasllita'] ?? '';
            break;
    }
    
    $_SESSION['usuario'] = $datosUsuario;
    $_SESSION['ultima_actividad'] = time();
    $_SESSION['ip_usuario'] = $_SERVER['REMOTE_ADDR'];

    // IMPORTANTE: Esta debe ser la estructura de respuesta
    respuestaJSON(true, "Bienvenido {$datosUsuario['nombres']}", ['usuario' => $datosUsuario]);
    exit; // Asegurar que no se ejecute más código
}

respuestaJSON(false, 'Solicitud no válida');
?>