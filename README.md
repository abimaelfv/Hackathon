<p align="center">
<a href="https://hackathon.sistemasudh.com" target="_blank">
<img src="https://hackathon.sistemasudh.com/img/logo.webp" width="300">
</a>
</p>

<hr/>

Sistema web de inscripción de equipos para hackathon UDH - 2024.

Enlace web: <a href="https://hackathon.sistemasudh.com" target="_blank">https://hackathon.sistemasudh.com</a>

## Tecnologías

-   Laravel (Backend)
-   PHP 8.3+
-   JavaScript
-   Vue.js
-   HTML5
-   CSS3
-   MySQL

## Requisitos

-   PHP 8.3 o superior
-   Composer
-   Node.js
-   MySQL

## Funcionalidades

-   Autenticación de usuarios
-   Incripción al hackathon
-   Validación de 4 personas por equipo
-   Exportación a Excel de los inscritos
-   Carga de data maestro de los estudiantes

## Instalación

1. Instalar dependencias PHP

```sh
composer install
```

2. Instalar dependencias Node

```sh
npm install
```

3. Copiar archivo de configuración

```sh
cp .env.example .env
```

4. Ejecutar servidor de desarrollo

```sh
npm run dev
```

5. Construir para producción

```sh
npm run build
```

## Comandos adicionales

1. Migración de base de datos

```sh
php artisan migrate
```

2. Construir datos iniciales

```sh
php artisan migrate:fresh --seed
```

3. Generar key de aplicación

```sh
php artisan key:generate
```

4. Crear enlace simbólico para storage

```sh
php artisan storage:link
```

5. Optimizar configuración de la aplicación

```sh
php artisan optimize
```
