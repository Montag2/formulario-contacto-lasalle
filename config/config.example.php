<?php

/**
 * ARCHIVO DE CONFIGURACIÓN DE EJEMPLO
 *
 * Instrucciones para el equipo:
 * 1. Copien este archivo y renómbrenlo como "config.php".
 * 2. NO suban "config.php" a Git si contiene credenciales reales.
 * 3. Ajusten los valores según el ambiente donde estén trabajando.
 */

// 1. CONFIGURACIÓN DEL AMBIENTE
// Opciones: 'desarrollo', 'pruebas', 'produccion'
define('APP_ENV', 'desarrollo');

// 2. CREDENCIALES DE BASE DE DATOS
define('DB_HOST', 'localhost');
define('DB_USER', 'usuario_ejemplo');
define('DB_PASS', 'TU_CONTRASENA_AQUI');
define('DB_NAME', 'lasalle_dev');

// 3. CONTROL DE ERRORES Y DEPURACIÓN
// Desarrollo y pruebas: errores visibles.
// Producción: errores ocultos por seguridad.

if (APP_ENV === 'desarrollo' || APP_ENV === 'pruebas') {

    // Muestra los errores en pantalla
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

} else {

    // Oculta los errores en pantalla
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

?>