# Canal Cero FullStack Test - Gráficos UF

## Breve descripción del proyecto: 
Proyecto para visualizar valores de la UF al día.

## Realizado: 🆗

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

## UF API de terceros: 📈

* Valor UF : https://mindicador.cl/api/uf

## Dependencias: 🛠

* UI Components : https://getbootstrap.com/
* Gestor de datos : https://vuex.vuejs.org/

## Ejecutar Aplicación Web: 🚀


### Gestor de paquetes: Instalación y ejecución:

1. Descargar e instalar Composer : https://getcomposer.org/download
2. Abrir consola y comprobar si esta instalado composer ejecutando el siguiente comando:
```
composer
```
### Base de datos : Instalación y ejecución

1. Descargar e instalar Laragon : https://laragon.org/download/
2. Abrir Laragon y levantar servicio de BBDD
3. Abrir MySQL por defecto
4. Crear una base de datos llamada "ufcanalcero"

### Clonar repositorio : Descargar aplicación web 

1. Abrir consola y pegar ruta : https://github.com/edidk7/LaravelVue_Test.git
2. Entrar a la carpeta del proyecto

### Servicio Web API REST : Inicialización Backend

1. Abrir consola y ejecutar los siguientes comandos: 

```
composer install
php artisan migrate
php artisan schedule:run
php artisan serve
```

### App Web SPA : Inicialización Frontend

1. En la raíz del proyecto entrar a la carpeta "frontVue"
2. En una nueva consola ejecutar los siguientes comandos:

```
npm install
npm run dev
```


