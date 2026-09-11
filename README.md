# Formulario de Contacto - Universidad de La Salle

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