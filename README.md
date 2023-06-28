
## About project

This application allows users to upload doc/docx files with variables, set values of them and convert file to PDF

### Instaliation

- clone project
- cp .env.example .env
- set DOCKER_POSTGRES_PORT
- add http://doc-to-pdf-vue3-app.local/ to hosts file
- docker-compose build
- docker-compose exec backend composer install
- docker-compose exec app php artisan migrate
- open http://doc-to-pdf-vue3-app.local/ or  http://localhost:DOCKER_HTTP_PORT

