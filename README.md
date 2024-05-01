<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Devstagram en Laravel

Devstagram es una aplicación web desarrollada con Laravel y Sail que permite a los usuarios compartir fotos, dar me gusta y comentar, similar a Instagram.

## Requisitos

- <a href="https://www.docker.com/" target="_blank">Docker</a>
- <a href="https://docs.docker.com/compose/" target="_blank">Docker Compose</a>

## Instalación

1. Clona el repositorio en tu máquina local:
    ```{bash}
   git clone https://github.com/danirodriguezz/Devstagram.git
    ```
2. Navega hasta el directorio del proyecto
   
    ```{bash}
    cd Devstagram
    ```
3. Copia el archivo de configuración de ejemplo y configuralo segun tus preferencias

    ```{bash}
   cp .env.example .env
    ```
4. Ejecuta el entorno de desarrollo con Docker Compose
   
    ```{bash}
   ./vendor/bin/sail up -d
    ```
5. Genera una clave de aplicación
   
    ```{bash}
    ./vendor/bin/sail artisan key:generate
    ```
6. Ejecuta las migraciones de la base de datos:

    ```{bash}
    ./vendor/bin/sail artisan migrate
    ```

7. Visita http://localhost en tu navegador para ver la aplicación Devstagram.

## Uso

1. Registrate en la aplicación creando un nuevo usuario
2. Sube fotos a la aplicación
3. Crea otros usuario
4. Buscalos en la barra de navegacion /{nombre de usuario}
5. Dale me gusta comenta y sigue a otros usuarios

## Mockups de Ordenador

![Mockup de escitorio](./imagenes/escritorio/e1.png)

![Mockup de escitorio](./imagenes/escritorio/e2.png)

![Mockup de escitorio](./imagenes/escritorio/e3.png)

![Mockup de escitorio](./imagenes/escritorio/e4.png)

![Mockup de escitorio](./imagenes/escritorio/e5.png)

## Mockups de Movil

![Mockup de escitorio](./imagenes/movil/m1.png)

![Mockup de escitorio](./imagenes/movil/m2.png)

![Mockup de escitorio](./imagenes/movil/m3.png)