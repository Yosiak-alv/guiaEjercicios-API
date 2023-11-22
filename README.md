# Desafio 3: Desafio 3 de Diseño y Programación de Software Multiplataforma
## Presentado Por:

### Luis Antonio Bonilla Elías BE202156
### Josias Isaac Alvarenga Romero AR200778
### Alfonso Antonio Fernández Cotto FC200910

## Requisitos Previos
Antes de comenzar, asegúrate de tener instalado Node.js en tu sistema. Puedes
descargarlo e instalarlo desde [nodejs.org](https://nodejs.org/).

## Clonar el Repositorio
1. Abre tu terminal y navega hasta la ubicación donde deseas clonar el repositorio.
2. Ejecuta el siguiente comando para clonar el repositorio:
```
git clone https://github.com/Yosiak-alv/guiaEjercicios-API
```
3. Ingresa al directorio del proyecto usando el comando:
```
cd guiaEjercicios-API
```

## Pasos a Seguir
1 .Run composer install on your cmd or terminal
```
composer install
```
2. Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
```
copy .env.example .env
```
3. Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
4. Run php artisan key:generate
```
php artisan key:generate
```
5. Run php artisan migrate
```
php artisan migrate
```
6. Run php artisan serve
```
php artisan serve
```

