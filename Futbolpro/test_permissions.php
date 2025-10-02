<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Test de Conexión MySQL</h1>";

// Datos de conexión
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'futbolpro_db';

echo "<p><strong>Host:</strong> $host</p>";
echo "<p><strong>Usuario:</strong> $user</p>";
echo "<p><strong>Base de datos:</strong> $db</p>";

// Intentar conexión
$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    echo "<p style='color: red;'><strong>Error:</strong> " . $conexion->connect_error . "</p>";
    echo "<p style='color: red;'><strong>Código de error:</strong> " . $conexion->connect_errno . "</p>";
} else {
    echo "<p style='color: green;'><strong>¡Conexión exitosa!</strong></p>";
    
    // Listar tablas
    $resultado = $conexion->query("SHOW TABLES");
    if ($resultado) {
        echo "<h3>Tablas en la base de datos:</h3><ul>";
        while ($fila = $resultado->fetch_array()) {
            echo "<li>" . $fila[0] . "</li>";
        }
        echo "</ul>";
    }
    
    $conexion->close();
}
?>