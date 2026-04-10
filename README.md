<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# SASCIL - Sistema de Administración y Seguimiento de Contratos, Instrumentos Legales y Licitaciones

Este proyecto es un sistema desarrollado en Laravel para la gestión y seguimiento de contratos, instrumentos legales y procesos de licitación.

## Características principales
- Gestión de contratos y actas
- Administración de alianzas y empresas
- Seguimiento de certificaciones presupuestarias
- Importación y exportación de datos
- Panel administrativo y reportes

## Requisitos
- PHP >= 7.4
- Composer
- MySQL o MariaDB
- Node.js y npm (para assets frontend)

## Instalación
1. Clona el repositorio:
	```bash
	git clone <url-del-repositorio>
	cd sascil-develop
	```
2. Instala dependencias backend:
	```bash
	composer install
	```
3. Instala dependencias frontend:
	```bash
	npm install
	```
4. Copia el archivo de entorno y configura tus variables:
	```bash
	cp .env.example .env
	# Edita .env con tus credenciales
	```
5. Genera la clave de la aplicación:
	```bash
	php artisan key:generate
	```
6. Realiza las migraciones y carga los datos iniciales:
	```bash
	php artisan migrate --seed
	```
7. Compila los assets:
	```bash
	npm run dev
	```
8. Inicia el servidor de desarrollo:
	```bash
	php artisan serve
	```

## Estructura del proyecto
- `app/` Código principal de la aplicación (modelos, controladores, servicios)
- `routes/` Definición de rutas web y API
- `resources/` Vistas, JS y CSS
- `database/` Migraciones, seeders y backups
- `public/` Archivos públicos y punto de entrada

## Pruebas
Ejecuta las pruebas con:
```bash
php artisan test
```

## Licencia
Este proyecto es propiedad de la organización desarrolladora. Uso interno.
