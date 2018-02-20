# SSRC-practica
Sistema de Solicitud de Recursos Computacionales


## Instalaciones previas
Se debe instalar:

1.[Laravel 5.5](https://laravel.com/docs/5.5/installation). En la terminal de Windows (cmd) ejecutar el siguiente comando:
```
composer global require "laravel/installer"

```
2.[Composer](https://getcomposer.org/download/) 
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

```
3.[WampServer](http://www.wampserver.com/en/)

4.[Laragon](https://laragon.org/): Incluye Laravel, MySql, un gestor de BD, un editor de texto, etc.

Opcional: 
-[Sublime Text](https://www.sublimetext.com/) para codificar.
-[MySQL](https://dev.mysql.com/downloads/installer/) para tener la interfaz de comandos.


## Correr el programa
El repositorio debe clonarse en:
```
C:\laragon\www\
```
o similar. Luego nos posicionamos con la terminal de Laragon en el mismo directorio con:
```
cd C:\laragon\www\
```
Hay que instalar ciertos modulos, para eso en la terminal:
```
composer install
```
Luego configuramos el  git:
```
cp .env.example .env
```
Para generar la Key
```
php artisan key:generate
```
Para correr el servidor:
```
php artisan serve
```

En este punto el programa un no es funcional al no existir base de datos, pero debería poder ver las vistas.

## Configuración de Base de Datos
```
Debe abrir el archivo .env y modificar los siguientes parametros:
DB_DATABASE=(Nombre de BD que creara)
DB_USERNAME=(User de BD que creara
DB_PASSWORD=(Password si quiere colocar)
```

Luego, debe abrir el gestor de BD de MySQL que viene con laragon y crear una BD propia con el nombre que puso en el archivo .env

