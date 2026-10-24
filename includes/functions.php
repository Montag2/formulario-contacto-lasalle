<?php
/**
 * Funciones de validación - Pruebas unitarias
 */

function validar_nombre($nombre) {
    if (empty(trim($nombre))) {
        return false;
    }
    return preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u", $nombre) === 1;
}

function validar_correo($correo) {
    if (empty(trim($correo))) {
        return false;
    }
    return filter_var($correo, FILTER_VALIDATE_EMAIL) !== false;
}

function validar_mensaje($mensaje) {
    $longitud = strlen(trim($mensaje));
    return ($longitud >= 10 && $longitud <= 500);
}
?>