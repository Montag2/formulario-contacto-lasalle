<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../includes/functions.php';

class test_pu extends TestCase {

    /**
     * Prueba unitaria PU-01: Correo electrónico válido
     */
    public function testValidEmailReturnsTrue() {
        $resultado = validar_correo("valeria.gallego@lasalle.edu.co");
        $this->assertTrue($resultado, "El correo electrónico válido debió ser aceptado.");
    }

    /**
     * Prueba unitaria PU-02: Mensaje demasiado corto (< 10 caracteres)
     */
    public function testShortMessageReturnsFalse() {
        $resultado = validar_mensaje("Hola");
        $this->assertFalse($resultado, "El mensaje corto debió ser rechazado por tener menos de 10 caracteres.");
    }

    /**
     * Prueba adicional: Nombre válido con tildes y espacios
     */
    public function testValidNameReturnsTrue() {
        $resultado = validar_nombre("Valeria Blandón");
        $this->assertTrue($resultado, "El nombre con espacios y tildes debió ser aceptado.");
    }
}
?>