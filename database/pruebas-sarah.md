# Actividad 8. Diseño y ejecución de pruebas de software

**Proyecto:** Formulario de contacto de la Universidad de La Salle  
**Asignatura:** Ingeniería de Software  
**Responsable de esta sección:** Sarah Useche  
**Entorno de pruebas:** PHP, Apache y MySQL Server 8.0  
**Base de datos:** `lasalle_dev`  
**Tabla evaluada:** `contactos`

## 1. Objetivo

Verificar el funcionamiento del formulario de contacto mediante pruebas funcionales y de integración, comprobando que las validaciones respondan adecuadamente ante diferentes entradas y que los datos válidos se almacenen correctamente en la base de datos.

## 2. Entorno de ejecución

La aplicación se ejecutó localmente mediante Apache de XAMPP. Para el almacenamiento se utilizó MySQL Server 8.0, al que la aplicación PHP se conectó mediante PDO. La consulta de los registros se realizó desde MySQL Workbench.

MySQL Server 8.0 se utilizó como servidor de base de datos porque el puerto 3306 estaba ocupado y no era posible iniciar simultáneamente el servicio MySQL de XAMPP. Esta configuración permitió ejecutar las pruebas sin detener el otro servicio.

## 3. Pruebas funcionales

### PF-01. Envío de un formulario con datos válidos

**Objetivo:** comprobar que el formulario acepta datos que cumplen las reglas de validación.

**Procedimiento:**
1. Abrir el formulario en el navegador.
2. Completar nombre, correo, asunto y mensaje con datos válidos.
3. Enviar el formulario.
4. Observar el resultado mostrado en pantalla.

**Resultado esperado:** el formulario acepta los datos y presenta un mensaje de confirmación.

**Resultado obtenido:** se mostró el mensaje de éxito indicando que el mensaje se guardó correctamente.

**Estado:** Aprobada.

### PF-02. Envío con el campo de mensaje vacío

**Objetivo:** comprobar que el formulario impide el envío cuando falta un campo obligatorio.

**Procedimiento:**
1. Abrir el formulario.
2. Dejar vacío el campo del mensaje.
3. Completar los demás campos.
4. Intentar enviar el formulario.

**Resultado esperado:** el sistema impide el envío y presenta una indicación de validación.

**Resultado obtenido:** el formulario bloqueó el envío y mostró la validación correspondiente.

**Estado:** Aprobada.

### PF-03. Envío con un correo electrónico inválido

**Objetivo:** verificar que el sistema rechaza una dirección de correo con formato incorrecto.

**Procedimiento:**
1. Completar el formulario.
2. Introducir `usuario@` como correo electrónico.
3. Intentar enviar los datos.

**Resultado esperado:** el sistema rechaza el correo inválido y solicita corregirlo.

**Resultado obtenido:** el formulario impidió el envío con el correo indicado.

**Estado:** Aprobada.

## 4. Prueba de integración con MySQL

**Código:** PI-01  
**Objetivo:** verificar la comunicación entre el formulario PHP y la base de datos MySQL.

**Procedimiento:**
1. Enviar desde el formulario un contacto con datos válidos.
2. Comprobar que la aplicación presenta el mensaje de éxito.
3. Abrir MySQL Workbench y seleccionar la base de datos `lasalle_dev`.
4. Consultar los últimos registros de la tabla `contactos`.

Consulta ejecutada:

```sql
USE lasalle_dev;

SELECT id, nombre, correo, asunto, mensaje, fecha_creacion
FROM contactos
ORDER BY id DESC
LIMIT 5;
```

**Resultado esperado:** los datos enviados desde el formulario aparecen almacenados en la tabla `contactos`.

**Resultado obtenido:** se visualizaron en MySQL los datos del contacto enviado desde el formulario.

**Estado:** Aprobada.

## 5. Evidencias

- **Evidencia 1:** formulario con datos válidos y mensaje de confirmación.
- **Evidencia 2:** validación mostrada al dejar vacío el campo del mensaje.
- **Evidencia 3:** validación al introducir el correo `usuario@`.
- **Evidencia 4:** consulta ejecutada en MySQL Workbench y registro guardado en la tabla `contactos`.

Las capturas deben corresponder a las ejecuciones reales y permitir identificar el resultado de cada prueba.

## 6. Conclusión

Las pruebas realizadas permitieron comprobar que el formulario responde a entradas válidas e inválidas según las validaciones implementadas. Además, la prueba de integración confirmó que los datos enviados correctamente desde la aplicación PHP se almacenan en MySQL. Estos resultados aportan evidencia del funcionamiento de las validaciones y de la comunicación entre la aplicación y su base de datos.

## 7. Alcance

Este documento registra las pruebas funcionales y de integración ejecutadas en esta sección del trabajo. Las pruebas adicionales que requiera la actividad deben documentarse con su propio procedimiento, resultado esperado, resultado obtenido y evidencia verificable.