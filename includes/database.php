<?php

require_once __DIR__ . '/../config/config.php';

try {

    $conexion = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS
    );

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    if (defined('APP_ENV') && (APP_ENV === 'desarrollo' || APP_ENV === 'pruebas')) {
        die("Error de conexión: " . htmlspecialchars($e->getMessage()));
    } else {
        die("No fue posible conectar con la base de datos.");
    }
}
?>