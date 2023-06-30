
## About project

This application allows users to upload doc/docx files with variables, set values of them and convert file to PDF

### Instaliation

- clone project
- cp .env.example .env
- set DOCKER_POSTGRES_PORT
- sed -i "s/DEV_LOCAL_UID=1/DEV_LOCAL_UID="$(id -u)"/" .env 
- sed -i "s/DEV_LOCAL_GID=1/DEV_LOCAL_GID="$(id -u)"/" .env-
- sed -i "s/DB_HOST=1/DB_HOST=postgres/" .env
- add http://doc-to-pdf-vue3-app.local/ to hosts file
- docker-compose build
- docker-compose up -d
- docker-compose exec backend composer install
- docker-compose exec backend php artisan key:generate
- docker-compose exec app php artisan migrate
- open http://doc-to-pdf-vue3-app.local/ or  http://localhost:DOCKER_HTTP_PORT

