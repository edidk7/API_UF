# Canal Cero FullStack Test - Gráficos UF

## Breve descripción del proyecto: 
Proyecto para visualizar valores de la UF al día.

## Realizado

1. Guardar datos de API de terceros en BBDD.
2. Creación API REST.
3. Consumo de API REST.
4. Renderizar datos en gráficos.

## Tecnologías: ✨

<img align="center" alt="bootstrap" width="30" height="30" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-original.svg"/> <img align="center" alt="javascript" width="30" height="30" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg"/>
  <img align="center" alt="vuejs" width="30" height="30" src="https://github.com/devicons/devicon/blob/master/icons/vuejs/vuejs-original.svg"/>
  <img align="center" alt="npm" width="30" height="30" src="https://github.com/devicons/devicon/blob/master/icons/npm/npm-original-wordmark.svg"/>
  <img align="center" alt="laravel" width="30" height="30" src="https://github.com/devicons/devicon/blob/master/icons/laravel/laravel-original.svg"/>
  <img align="center" alt="mysql" width="30" height="30" src="https://github.com/devicons/devicon/blob/master/icons/mysql/mysql-original-wordmark.svg"/>

## Dependencias: 🖌️

* UI Components : https://getbootstrap.com/


## Gestor de paquetes: Instalación y ejecución:

1. Descargar e instalar Composer : https://getcomposer.org/download
2. Abrir consola y comprobar si esta instalado composer
```
composer
```
## Base de datos : Instalación y ejecución:

1. Descargar e instalar Laragon : https://laragon.org/download/
2. Abrir Laragon y levantar servicio de BBDD
3. Abrir MySQL por defecto
4. Crear una base de datos llamada "ufcanalcero"

## Servicio Web API REST : Inicialización : 🚀

1. Iniciar Backend. 


```
composer install
php artisan migrate
php artisan schedule:run
php artisan serve
```

2. Iniciar Frontend.

En la raíz del proyecto entrar a la carpeta "frontVue" y en una nueva terminal ejecutar los siguientes comandos:

```
npm install
npm run dev
```


