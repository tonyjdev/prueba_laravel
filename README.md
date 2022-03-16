# Prueba Laravel

## Herramientas y versiones utilizadas

- Laravel 8.83.5
- PHP 7.4.27
- MariaDB 10.4.22
- Composer 2.2.8
- NodeJS 16.14.0 LTS

## Descargar la prueba

El proyecto puede descargarse de las siguientes maneras: 
- git clone https://github.com/tonyjdev/prueba_laravel.git
- git clone git@github.com:tonyjdev/prueba_laravel.git
- archivo zip: [Descargar](https://github.com/tonyjdev/prueba_laravel/releases/tag/v0.1)

## Archivos adicionales

Como archivos adicionales se incluye:

- Colección Postman con los endpoint
- Archivo SQL para la creación de la BBDD al completo


## Instalación

El archivo .zip incluye todos los paquetes (node_modules) por lo que no sería necesario realizar ningún tipo de instalación en este sentido:
[Descargar](https://github.com/tonyjdev/prueba_laravel/releases/tag/v0.1)

Si la descarga se ha hecho a través de la clonación del proyecto, ejecutar en la raíz:

```
composer install

npm install
```

## Base de Datos

Para poner en marcha la base de datos tenemos dos opciones:

- Descargar el archivo "prueba_laravel.sql" y ejecutarlo o importarlo en la herramienta correspondiente. Está probado con phpMyAdmin, y se encuentra en la siguiente ruta:
```
\app\config\setup\prueba_laravel.sql
```

- Crear la base de datos mediante los siguientes comandos:
```
// A través de la consola de MySQL/MariaDB o en herramienta similar
CREATE DATABASE prueba_sql;

// Desde el terminal, en la raíz del proyecto
php artisan migrate
```

## Arrancar el servidor

Una vez instalada la aplicación podemos arrancar el servidor desde el terminal con el siguiente comando en la raíz del proyecto:
```
php artisan serve
```

## Probando el proyecto

Se incluye en el proyecto el archivo de una colección de Postman para poder probarlo en dicha herramienta.
Esta colección se encuentra en la siguiente ruta:
```
\app\config\setup\PruebaLaravel.postman_collection.json
```

### Rutas
| Method | URI | Action |
|:-------| :--- | :--- |
| GET    | api/estudiante      | App\Http\Controllers\EstudianteController@index            |
| GET    | api/estudiante/{id} | App\Http\Controllers\EstudianteController@show             |
| POST   | api/estudiante      | App\Http\Controllers\EstudianteController@store            |
| PUT    | api/estudiante      | App\Http\Controllers\EstudianteController@update           |
| DELETE | api/estudiante/{id} | App\Http\Controllers\EstudianteController@destroy          |
