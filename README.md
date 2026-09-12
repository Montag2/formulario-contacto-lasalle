# Formulario de Contacto La Salle - Arquitectura, Pruebas y Validación

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

Para comprobar el funcionamiento de la aplicación se deben realizar, como mínimo, las siguientes verificaciones:

* Abrir correctamente la página principal.
* Intentar enviar el formulario dejando campos obligatorios vacíos.
* Verificar la validación del campo de correo electrónico.
* Completar correctamente los campos y realizar el envío.
* Verificar que se muestre el mensaje de confirmación correspondiente.
* Comprobar que la aplicación mantenga su funcionamiento después de integrar los cambios realizados por los integrantes del equipo.

## Seguridad

No se deben publicar en el repositorio contraseñas, tokens, claves, archivos `.env` reales ni archivos de configuración que contengan credenciales.

El archivo `.gitignore` está configurado para excluir los archivos de configuración sensibles del repositorio.


## Requisitos del Entorno

- XAMPP con servidor Apache y MySQL en ejecución local.
- Navegador web moderno (Chrome, Firefox o Edge) para pruebas de UI.
- Modo debug activo en PHP para captura de errores en desarrollo.