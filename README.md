# Formulario de Contacto La Salle - Arquitectura

Este proyecto es una aplicación web sencilla creada para demostrar la configuración y diferenciación de tres ambientes: **Desarrollo, Pruebas y Producción**. Corresponde a la Actividad 4 de la materia.

## Tecnologías Utilizadas
* **Frontend:** HTML5, CSS3, JavaScript (Canvas API para efectos de fondo).
* **Backend:** PHP 8+.
* **Base de Datos:** MySQL (XAMPP).
* **Entorno de Desarrollo:** Visual Studio Code.

## Estructura del Proyecto

La arquitectura del proyecto está organizada de forma modular para separar la lógica, la configuración y el diseño:

```text
formulario-contacto-lasalle/
│
├── config/
│   └── config.example.php   # Plantilla de configuración general del proyecto (rutas, constantes).
│
├── css/
│   └── styles.css           # Hoja de estilos principal que define el diseño responsivo del formulario.
│
├── database/
│   └── schema.sql           # Script SQL con la estructura de las tablas necesarias para la base de datos.
│
├── img/
│   ├── juanita_form_peeker.png                             # Recurso gráfico de la mascota (si aplica).
│   └── Logo_de_la_Univesidad_de_la_Salle_(Bogotá).svg.png  # Logo oficial de la institución.
│
├── includes/                # Archivos modulares de PHP reutilizables
│   ├── database.php         # Script encargado de establecer y gestionar la conexión a la base de datos.
│   ├── footer.php           # Fragmento de código correspondiente al pie de página del layout.
│   └── header.php           # Fragmento de código correspondiente a la cabecera e importación de assets.
│
├── .env.example             # Plantilla de variables de entorno para configurar BD y modos de ejecución. No contiene datos sensibles.
├── .gitignore               # Reglas de exclusión para Git (evita subir el archivo .env real y logs).
├── index.php                # Punto de entrada principal de la aplicación. Renderiza el formulario y procesa la petición inicial (POST).
└── README.md                # Este archivo de documentación técnica y manual de instalación.

## Requisitos del Entorno
* XAMPP con servidor Apache y motor MySQL 8.0/MariaDB.
* PHP 8.1 o superior con extensión PDO y modo debug para desarrollo.
* Navegador web actualizado para validaciones funcionales de interfaz.
## Configuración del proyecto

1. Clonar el repositorio desde GitHub dentro de la carpeta `htdocs` de XAMPP.

2. Crear una copia del archivo `.env.example` y renombrarla como `.env`.

3. Configurar en `.env` los datos correspondientes al ambiente local, especialmente la conexión con MySQL.

4. Crear una copia de `config/config.example.php` y renombrarla como `config/config.php`.

5. Ajustar en `config.php` los valores de conexión de acuerdo con la configuración local de MySQL.

> El archivo `.env` y el archivo `config/config.php` no deben publicarse en GitHub cuando contienen credenciales o información sensible.

## Configuración de la base de datos

1. Iniciar Apache y MySQL desde XAMPP.

2. Ingresar a phpMyAdmin.

3. Crear una base de datos denominada `lasalle_dev` o utilizar el nombre definido en la configuración local.

4. Importar el archivo `database/schema.sql` para crear la estructura necesaria.

5. Verificar que los datos de conexión configurados correspondan a la base de datos creada.

## Ejecución de la aplicación

Con Apache y MySQL activos, abrir en el navegador:

`http://localhost/formulario-contacto-lasalle/`

La aplicación debe mostrar el formulario de contacto de la Universidad de La Salle.

## Pruebas básicas

Para comprobar el funcionamiento de la aplicación se deben realizar las siguientes verificaciones en el navegador y también mediante una petición POST directa cuando sea posible:

* Abrir correctamente la página principal.
* Enviar el formulario con campos vacíos y confirmar que se muestre el mensaje de campos obligatorios.
* Probar un nombre con números o símbolos y confirmar que sea rechazado.
* Probar un nombre válido con tilde, guion o apóstrofe y confirmar que sea aceptado.
* Probar un correo sin formato válido y confirmar que sea rechazado.
* Probar un asunto de menos de 3 caracteres y confirmar que sea rechazado.
* Probar un mensaje de menos de 10 o más de 500 caracteres y confirmar que sea rechazado.
* Completar todos los campos con valores válidos y verificar el mensaje de confirmación.

### Reglas de validación

| Campo | Reglas |
| --- | --- |
| Nombre | Obligatorio, entre 2 y 80 caracteres; admite letras, espacios, guiones y apóstrofes. |
| Correo | Obligatorio, formato de correo válido y máximo 254 caracteres. |
| Asunto | Obligatorio, entre 3 y 120 caracteres. |
| Mensaje | Obligatorio, entre 10 y 500 caracteres. |

Las restricciones se aplican tanto en HTML5 como en PHP. La validación del servidor es la definitiva, porque también controla solicitudes que no provengan directamente del navegador.

### Verificación después de integrar cambios

Después de integrar una rama mediante pull request:

1. Confirmar que no existan conflictos pendientes con `git status`.
2. Abrir nuevamente la página principal.
3. Repetir las pruebas de valores inválidos y válidos descritas arriba.
4. Registrar en la revisión del pull request el resultado de la prueba final.

## Seguridad

No se deben publicar en el repositorio contraseñas, tokens, claves, archivos `.env` reales ni archivos de configuración que contengan credenciales.

El archivo `.gitignore` está configurado para excluir los archivos de configuración sensibles del repositorio.


