# Pruebas funcionales - Formulario de Contacto La Salle

## Objetivo

Verificar que el formulario valide correctamente los datos ingresados y que el flujo de envío funcione de acuerdo con los requisitos del proyecto.

## Caso de prueba 1 - Envío correcto

### Datos de entrada

- Nombre: Jaime Ocampo
- Correo: jaime@ejemplo.com
- Asunto: Solicitud de información
- Mensaje: Solicito información sobre los servicios disponibles.

### Resultado esperado

El formulario acepta la información y muestra un mensaje de confirmación indicando que los datos fueron validados correctamente.

### Estado

Aprobado.

---

## Caso de prueba 2 - Campo obligatorio vacío

### Datos de entrada

- Nombre: Jaime Ocampo
- Correo: jaime@ejemplo.com
- Asunto: Solicitud de información
- Mensaje: vacío

### Resultado esperado

El sistema debe impedir el envío e informar que el campo es obligatorio.

### Estado

Aprobado.

---

## Caso de prueba 3 - Correo electrónico inválido

### Datos de entrada

- Nombre: Jaime Ocampo
- Correo: usuario@
- Asunto: Solicitud de información
- Mensaje: Esta es una prueba de validación del correo electrónico.

### Resultado esperado

El sistema debe rechazar el correo ingresado e informar que el formato no es válido.

### Estado

Aprobado.

---

## Resultado general

Las validaciones principales del formulario fueron verificadas correctamente. El sistema controla los campos obligatorios, valida el formato del correo electrónico y aplica restricciones de longitud en los campos definidos.