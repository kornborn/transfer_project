

1) `docker run --rm -v $(pwd):/app composer/composer install`

2) `docker-compose up -d --build`

3) `cp .env_example .env`

4) `docker-compose exec app php artisan key:generate`

5) `docker-compose exec app php artisan optimize`
  
6) `sudo chmod -R 777 storage && sudo chmod -R 777 bootstrap/cache`

Сайт доступен на http://localhost:8080/

`docker-compose exec app php artisan migrate --seed`\
`docker-compose exec app php artisan make:controller MyController`
