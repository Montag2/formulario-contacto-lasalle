<?php
// Importar configuración global
@include_once 'config/config.php';

// Inicializamos variables para los mensajes
$mensaje_estado = '';
$debug_info = '';
$limites = [
    'nombre' => ['minimo' => 2, 'maximo' => 80],
    'correo' => ['minimo' => 5, 'maximo' => 254],
    'asunto' => ['minimo' => 3, 'maximo' => 120],
    'mensaje' => ['minimo' => 10, 'maximo' => 500],
];

function longitud_texto(string $texto): int
{
    return function_exists('mb_strlen') ? mb_strlen($texto, 'UTF-8') : strlen($texto);
}

// Verificamos si el formulario fue enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capturamos los datos
    $nombre = preg_replace('/\s+/u', ' ', trim($_POST['nombre'] ?? ''));
    $correo = strtolower(trim($_POST['correo'] ?? ''));
    $asunto = preg_replace('/\s+/u', ' ', trim($_POST['asunto'] ?? ''));
    $mensaje = trim($_POST['mensaje'] ?? '');

    // 1. Validar que no estén vacíos
    if ($nombre === '' || $correo === '' || $asunto === '' || $mensaje === '') {
        $mensaje_estado = "<div class='alerta error'>Por favor, completa todos los campos obligatorios.</div>";
    }
    // 2. Validar restricciones del Nombre (letras, espacios y tildes en español)
    elseif (longitud_texto($nombre) < $limites['nombre']['minimo'] || longitud_texto($nombre) > $limites['nombre']['maximo']) {
        $mensaje_estado = "<div class='alerta error'>El nombre debe tener entre 2 y 80 caracteres.</div>";
    }
    elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+(?:[ '-][a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+)*$/u", $nombre)) {
        $mensaje_estado = "<div class='alerta error'>El nombre solo debe contener letras y espacios (sin números ni símbolos).</div>";
    }
    // 3. Validar restricciones del Correo (estructura y longitud)
    elseif (longitud_texto($correo) > $limites['correo']['maximo'] || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje_estado = "<div class='alerta error'>El correo electrónico no es válido (debe incluir '@' y un dominio correcto).</div>";
    }
    // 4. Validar longitud del asunto
    elseif (longitud_texto($asunto) < $limites['asunto']['minimo'] || longitud_texto($asunto) > $limites['asunto']['maximo']) {
        $mensaje_estado = "<div class='alerta error'>El asunto debe tener entre 3 y 120 caracteres.</div>";
    }
    // 5. Validar longitud del mensaje contando caracteres, no bytes
    elseif (longitud_texto($mensaje) < $limites['mensaje']['minimo'] || longitud_texto($mensaje) > $limites['mensaje']['maximo']) {
        $mensaje_estado = "<div class='alerta error'>El mensaje debe tener entre 10 y 500 caracteres (actualmente tiene " . longitud_texto($mensaje) . ").</div>";
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
                    minlength="2" maxlength="80"
                    pattern="[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+(?:[ '-][A-Za-záéíóúÁÉÍÓÚüÜñÑ]+)*"
                    title="Usa entre 2 y 80 caracteres: solo letras, espacios, guiones o apóstrofes" required>
            </div>
            <div class="campo">
                <label for="correo">Correo electrónico</label>
                <!-- type="email" exige el uso del @ obligatoriamente -->
                <input type="email" id="correo" name="correo" placeholder="correo@ejemplo.com"
                    maxlength="254" autocomplete="email" required>
            </div>
        </div>
        <div class="campo">
            <label for="asunto">Asunto</label>
            <input type="text" id="asunto" name="asunto" placeholder="Motivo de tu mensaje"
                minlength="3" maxlength="120" required>
        </div>
        <div class="campo">
            <label for="mensaje">Mensaje (Máximo 500 caracteres)</label>
            <!-- minlength y maxlength controlan la cantidad de caracteres -->
            <textarea id="mensaje" name="mensaje" rows="5" minlength="10" maxlength="500"
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