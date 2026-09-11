<?php
// Importar configuración global
@include_once 'config/config.php';

// Inicializamos variables para los mensajes
$mensaje_estado = '';
$debug_info = '';

// Verificamos si el formulario fue enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capturamos los datos
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $asunto = trim($_POST['asunto'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    // 1. Validar que no estén vacíos
    if (empty($nombre) || empty($correo) || empty($asunto) || empty($mensaje)) {
        $mensaje_estado = "<div class='alerta error'>Por favor, completa todos los campos obligatorios.</div>";
    }
    // 2. Validar restricciones del Nombre (Solo letras, espacios y tildes en español)
    elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u", $nombre)) {
        $mensaje_estado = "<div class='alerta error'>El nombre solo debe contener letras y espacios (sin números ni símbolos).</div>";
    }
    // 3. Validar restricciones del Correo (Estructura real con @)
    elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje_estado = "<div class='alerta error'>El correo electrónico no es válido (debe incluir '@' y un dominio correcto).</div>";
    }
    // 4. Validar restricciones de longitud del Mensaje (Ej: Mínimo 10, máximo 500 caracteres)
    elseif (strlen($mensaje) < 10 || strlen($mensaje) > 500) {
        $mensaje_estado = "<div class='alerta error'>El mensaje debe tener entre 
        10 y 500 caracteres (actualmente tiene " . strlen($mensaje) . ").</div>";
    } else {
        // Si todo pasa las validaciones de PHP:
        $mensaje_estado = "<div class='alerta exito'>¡Gracias, <strong>" . htmlspecialchars($nombre) . "</strong>! 
        Tu mensaje ha sido validado y recibido correctamente.</div>";

        // Modo Debug (Ambiente de Desarrollo)
        $debug_info = "
        <div class='debug-box'>
            <h4>🛠️ Modo Debug (Ambiente de Desarrollo)</h4>
            <p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>
            <p><strong>Correo:</strong> " . htmlspecialchars($correo) . "</p>
            <p><strong>Asunto:</strong> " . htmlspecialchars($asunto) . "</p>
            <p><strong>Mensaje:</strong> " . htmlspecialchars($mensaje) . "</p>
            <p><em>* Validación superada con éxito (Longitud de mensaje: " . strlen($mensaje) . " chars) *</em></p>
        </div>";
    }
}

// Importamos la cabecera modular
include 'includes/header.php';
?>

<section class="tarjeta">
    <div class="logo">
        <img src="img/Logo_de_la_Univesidad_de_la_Salle_(Bogotá).svg.png" alt="Universidad de La Salle">
    </div>

    <div class="encabezado">
        <p class="titulo-pequeno">Formulario de Contacto</p>
        <h1>¿Cómo podemos ayudarte?</h1>
        <p class="descripcion">
            Déjanos tus datos y cuéntanos en qué podemos ayudarte.
            Nuestro equipo se pondrá en contacto contigo.
        </p>
    </div>

    <!-- AQUÍ IMPRIMIMOS LOS MENSAJES DE PHP -->
    <?php
    if (!empty($mensaje_estado)) echo $mensaje_estado;
    if (!empty($debug_info)) echo $debug_info;
    ?>

    <!-- Agregamos restricciones HTML5 (pattern, minlength, maxlength) para apoyar la validación -->
    <form action="" method="POST">
        <div class="fila">
            <div class="campo">
                <label for="nombre">Nombre completo</label>
                <!-- pattern permite solo letras con tildes y espacios -->
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre"
                    pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras y espacios" required>
            </div>
            <div class="campo">
                <label for="correo">Correo electrónico</label>
                <!-- type="email" exige el uso del @ obligatoriamente -->
                <input type="email" id="correo" name="correo" placeholder="correo@ejemplo.com" required>
            </div>
        </div>
        <div class="campo">
            <label for="asunto">Asunto</label>
            <input type="text" id="asunto" name="asunto" placeholder="Motivo de tu mensaje" required>
        </div>
        <div class="campo">
            <label for="mensaje">Mensaje (Máximo 500 caracteres)</label>
            <!-- minlength y maxlength controlan la cantidad de caracteres -->
            <textarea id="mensaje" name="mensaje" rows="5" minlength="10" 
            maxlength="500"
                placeholder="Escribe tu mensaje aquí (mínimo 10 caracteres)..." 
                required></textarea>
        </div>
        <button type="submit">
            Enviar mensaje
        </button>
    </form>

    <p class="pie">
        Universidad de La Salle · Formulario de contacto
    </p>
</section>

<?php
// Importamos el pie de página modular
include 'includes/footer.php';
?>