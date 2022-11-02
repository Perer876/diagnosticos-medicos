<h1 align="center">Diagnósticos Medicos</h1>
<p align="center">Proyecto escolar donde desarrollaremos un sistema que administre un consultorio médico / hospital y podamos, con un sistema experto, ser de apoyo a medicos dándoles una sugerencia de lo que podría padecer un paciente según sus síntomas y signos.</p>

## Instalación
1. Clonar el proyecto
    ```bash
    git clone https://gitlab.com/Perer876/diagnosticos-medicos.git
    cd diagnosticos-medicos
    ```
2. Instalar dependencias de PHP
    ```bash
    composer install
    ```
    Y también dependencias de JavaScript
    ```bash
    npm install && npm run dev
    ```

3. Crear archivo de configuración propio y generar llave
    ```bash
    copy .env.example .env
    php artisan key:generate
    ```

4. Configurar la base de datos en el archivo ``.env``

5. Ejecutar las migraciones y el seeder
    ```bash
    php artisan migrate --seed
    ```
   Para llenar los datos de los países y estados del mundo, 
    ejecutar. Se toma un poco de tiempo:
    ```bash
    php artisan db:seed --class=PaisesEstadosSeeder
    ```
## Credenciales de inicio de sesión

* **Alias:** Admin
* **Password:** password
