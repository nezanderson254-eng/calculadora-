# Calculadora web con Laravel 12

Proyecto educativo que transforma la calculadora PHP original en una aplicación Laravel organizada con MVC.

## Requisitos
- PHP 8.2 o superior y extensiones requeridas por Laravel.
- Composer.
- Node.js y npm.
- SQLite (incluido normalmente con PHP) o MySQL.

## Instalación en Windows (XAMPP + Visual Studio Code)
1. Descomprime la carpeta `laravel_calculadora`.
2. Abre esa carpeta en Visual Studio Code.
3. En la terminal ejecuta:

```bash
composer install
copy .env.example .env
php artisan key:generate
```

4. Crea un archivo vacío llamado `database.sqlite` dentro de la carpeta `database`.
5. Ejecuta:

```bash
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

6. Abre `http://127.0.0.1:8000`.

> Si usas MySQL, cambia `DB_CONNECTION=mysql` y completa DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME y DB_PASSWORD en `.env`; crea primero la base de datos en phpMyAdmin.

## Qué incluye (temas solicitados)

### Arquitectura y núcleo
- **MVC:** `Calculation` es el modelo, `resources/views` contiene la vista y `CalculadoraController` controla el flujo.
- **Rutas:** `routes/web.php` define GET `/` y POST `/calcular`.
- **Controladores:** reciben la petición y coordinan el servicio y la vista.
- **Middleware:** `EnsureDemoAccess` muestra la estructura de un middleware.
- **Request:** `CalcularRequest` valida los datos recibidos.
- **Response:** el controlador devuelve una vista o una redirección con mensajes de sesión.
- **Service Container:** `AppServiceProvider` registra `CalculadoraService` para inyección de dependencias.

### Base de datos
- **Migraciones:** crean la tabla `calculations`.
- **Eloquent / Modelos:** `Calculation` representa la tabla y permite guardar operaciones.
- **Relaciones:** no se necesita una relación entre tablas en esta calculadora básica; se pueden agregar cuando exista otra entidad relacionada.
- **Seeders:** `CalculationSeeder` agrega datos de prueba.
- **Factories:** `CalculationFactory` genera operaciones ficticias.
- **Query Builder:** ejemplo para consultar el historial directamente:
  `DB::table('calculations')->latest()->take(10)->get();`
- **Eloquent:** ejemplo usado en el controlador: `Calculation::latest()->take(10)->get()`.

### Interfaz y frontend
- **Blade:** `resources/views/calculadora/index.blade.php`.
- **Directivas:** `@if`, `@error`, `@forelse`, `@empty` y `@csrf`.
- **Componentes:** `resources/views/components/layout.blade.php` se usa como `<x-layout>`.
- **Layouts:** el componente layout contiene la estructura HTML común.
- **Vite:** compila CSS y JavaScript con `npm run dev` o `npm run build`.

### Seguridad y sesiones
- **CSRF:** `@csrf` protege el formulario POST.
- **Validación:** reglas en `CalcularRequest`; la división por cero se evita en el servicio.
- **Autenticación:** el proyecto puede incorporar inicio de sesión con Laravel Breeze.
- **Autorización:** `CalculationPolicy` es un ejemplo base de policy; se debe adaptar a usuarios y propiedad de registros si se vuelve privada la información.
- **Sesiones:** `with('resultado', ...)` muestra el resultado después de redirigir.

### Herramientas y entorno
- **Artisan:** comandos como `php artisan serve`, `migrate`, `db:seed` y `make:model`.
- **Composer:** instala las dependencias PHP.
- **.env:** guarda configuración local y credenciales; no se debe publicar.
- **Tinker:** consola interactiva para probar Eloquent: `php artisan tinker`.
- **Breeze:** paquete opcional para scaffolding de autenticación. Para instalarlo:
  `composer require laravel/breeze --dev`
  `php artisan breeze:install blade`
  `php artisan migrate`
  `npm install && npm run build`
  Sigue las instrucciones que muestre el instalador según la versión.

## Comandos útiles
```bash
php artisan route:list
php artisan make:model Ejemplo -m
php artisan make:controller EjemploController
php artisan make:middleware MiMiddleware
php artisan make:request MiRequest
php artisan make:seeder MiSeeder
php artisan make:factory MiFactory
php artisan tinker
```

## Importante
Este ZIP contiene el código fuente del proyecto, no la carpeta `vendor` ni `node_modules`. Es normal: se generan en tu computador con Composer y npm durante la instalación. Middleware, Policy y Breeze se incluyen como ejemplos/documentación para estudiar; la calculadora funciona sin iniciar sesión.
