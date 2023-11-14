**README.md**

# Sistema de Reciclaje

## Justificación

Este proyecto tiene como objetivo principal la implementación de un sistema de reciclaje integral, orientado a empresas con fines comerciales. La necesidad de abordar los desafíos relacionados con la gestión de residuos es evidente, considerando las problemáticas asociadas al crecimiento poblacional, la concentración urbana desordenada y el desarrollo industrial sin planificación. Este sistema busca mejorar la eficiencia en el manejo de residuos, fomentando prácticas sostenibles y ofreciendo herramientas para la gestión interna y la toma de decisiones informada.

## Configuración del Entorno de Desarrollo

Asegúrate de tener instalado lo siguiente en tu entorno de desarrollo:

- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/)
- [Node.js](https://nodejs.org/)

## Pasos para Configurar el Proyecto

1. **Clona el Repositorio:**

    ```bash
    git clone https://github.com/tu-usuario/waste-manager.git
    ```

2. **Instala las Dependencias de PHP:**

    ```bash
    cd waste-manager
    composer install
    ```

3. **Instala las Dependencias de JavaScript:**

    ```bash
    npm install
    ```

4. **Configura el Archivo de Entorno:**

    - Copia el archivo `.env.example` a `.env`.
    - Configura la conexión a la base de datos y otras configuraciones según sea necesario.

5. **Genera la Clave de Aplicación:**

    ```bash
    php artisan key:generate
    ```

6. **Realiza las Migraciones de la Base de Datos:**

    ```bash
    php artisan migrate
    ```

7. **Inicia el Servidor de Desarrollo:**

    ```bash
    php artisan serve
    ```

    El servidor estará disponible en [http://localhost:8000](http://localhost:8000).

## Uso del Sistema

### Administrador

- **Gestión de Empleados y Usuarios:**
  - Accede al panel de administración para realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) de empleados y usuarios.
  - Añade nuevos empleados y usuarios.
  - Actualiza la información de empleados y usuarios.
  - Elimina registros de empleados y usuarios según sea necesario.

### Clasificador

- **Gestión del Inventario de Basura:**
  - Accede al módulo de clasificación para realizar operaciones CRUD sobre el inventario de basura.
  - Registra nuevos elementos en el inventario de basura.
  - Actualiza la información de los elementos existentes.
  - Elimina elementos del inventario de basura.

- **Registro de Ingresos de Basura:**
  - Registra los ingresos de basura al sistema.
  - Actualiza la información relacionada con los ingresos de basura.
  - Elimina registros de ingresos de basura según sea necesario.

### Operador

- **Gestión del Inventario de Reciclaje:**
  - Accede al módulo de operaciones para gestionar el inventario de reciclaje.
  - Registra nuevos elementos en el inventario de reciclaje.
  - Actualiza la información de los elementos existentes.
  - Elimina elementos del inventario de reciclaje.

### Vendedor

- **Gestión de Ventas:**
  - Accede al área de ventas para realizar operaciones CRUD sobre las transacciones de venta.
  - Registra nuevas ventas de productos reciclados.
  - Actualiza la información de las ventas existentes.
  - Elimina registros de ventas según sea necesario.

Estas funcionalidades proporcionan a cada tipo de usuario la capacidad de realizar acciones específicas dentro del sistema, asegurando una experiencia personalizada y eficiente de acuerdo con sus roles y responsabilidades.

## Contribuciones

Si encuentras errores o tienes sugerencias de mejora, no dudes en abrir un problema o enviar un pull request.

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para obtener más detalles.