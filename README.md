# PruebaTecnica-GNL
Repositorio del proyecto desarrollado como prueba técnica para Global Next Level.

## Información del proyecto

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Laravel is accessible, powerful, and provides tools required for large, robust applications.
- Proyecto realizado con el framework PHP Laravel en su version 10.
- El esquema visual de la base de datos esta diseñado en MySQL Workbench y disponible en la carpeta "database/prototype/Base.mwb" y "database/prototype/Base.png".
- Se uso la pila de desarrollo XAMPP en su versión compatible con el framework.

## Pre-requisitos de instalación (Local)
- Instalar o tener instalado XAMPP para PHP 8.2 (xampp-windows-x64-8.2.12-0-VS16-installer.exe). [Página oficial](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/)
- Instalar o tener instalado el administrado de paquete [composer](https://getcomposer.org/).
- Instalar o tener instalado [node](https://nodejs.org/en/download/).

## Instalación (Local)
- Tener habilitada las extensiones gd y zip en el archivo de configuración php.ini.
- Acceder a la carpeta raiz del proyecto.
- Ejecuta en orden los comandos "composer install" y "npm install".
- Crear una copia del archivo ".env.example" y colocarle el nombre ".env".
- Configura las variables "DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME y DB_PASSWORD" de acuerdo a la configuracion de tu entorno.
- Descomprime el archivo "storage.zip".
- Ejecuta en orden los comandos "php artisan key:generate", "php artisan migrate --seed".

## Activación de tareas automáticas (Solo si tienes activado cron en tu servidor)
- Configura en tu archivo de scripts de cron el comando "* * * * * php /ruta/a/tu/proyecto/artisan schedule:run >> /dev/null 2>&1".
- Para activar el sorteo automático ejecuta el comando "php artisan schedule:run" luego de los pasos anteriores.
- Esto permitirá que se elija al ganador automáticamente.

## Despliegue (Local)
- Una vez finalizada la parte de instalación, ejecuta en orden los comandos "php artisan serve" y "npm run build".
- Accede al enlace generado por el comando "php artisan serve", Ejm: http://127.0.0.1:8000/ y ahora ya puedes acceder al sistema.

## Manual de usuario
- Para registrar a los clientes se presiona el botón "Registrate aquí".
- Los campos para registrar clientes cuentan con restricciones al tipo de dato que se puede ingresar y a la cantidad de caracteres que admite.
- Para ver los ganadores de premios presiona el botón "Lista de ganadores".

## Manual de usuario (Administradores)
- Para registrar un administrador puedes acceder al enlace "Registro admin".
- Para iniciar sesion como administrador puedes acceder al enlace "Iniciar sesión".
- Están disponibles las tablas "Premios, Ganadores y Clientes" para ver su información más importante.
- Para registrar los premios por sortear puedes llenar los campos que están sobre la tabla "premios" y presionar el botón "Agregar".
- Para iniciar el sorteo del premio presiona el botón "Iniciar próximo sorteo".
- Para descargar toda la información editable del sistema presiona el botón "Descarga todos los registros".

## Notas a tener en cuenta
- Esta habilitado el soporte al "modo oscuro o dark mode".
- La acción de presionar el botón "Iniciar próximo sorteo" estará dísponible para el administrador desde el "dashboard", como tal se da la libertad de iniciar el sorteo si no quieres activar las tareas automaticas.
- En el archivo "laravel.log" quedarán registrado cada vez que se elija un ganador o se intente elegir un ganador.
