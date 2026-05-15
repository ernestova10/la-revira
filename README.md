# La Revirá de Sevilla
![Logo La Revirá](/public/img/Logo.jpg)

## 🌐 Acceso a la Aplicación

### 💡 Notas adicionales
Asegúrate de tener **Docker** y **Docker Compose** instalados en tu sistema.



## 🚀 Instalación y Puesta en Marcha

Sigue estos pasos para configurar el entorno de desarrollo local utilizando Docker.

### 1. Clonar el repositorio
Primero, clona el proyecto y accede al directorio raíz:
```bash
git clone https://github.com/ernestova10/la-revira

cd la-revira
```
### 2. Configuración del entorno
Copia el archivo de ejemplo .env.example a .env con el comando:
```bash
cp .env.example .env
```
En el docker compose añadimos en volumes:
```bash
- /var/www/html/vendor
```

En el dockerfile eliminamos la última línea dejando sólo:
```bash
php artisan serve - -host=0.0.0.0 - -port=10000
```
Después haremos el docker compose up para construir las imágenes y levantar los contenedores.

### 3. Instalar las dependencias
Para ello debemos de poner los siguientes comandos:
```bash
docker compose exec app npm install
docker compose exec app npm run build
```

Para acceder a la app debemos de acceder a http://localhost:8000 y podremos hacer uso de la web.