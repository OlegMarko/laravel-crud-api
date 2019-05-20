<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Run app with Docker

- `git clone https://github.com/OlegMarko/laravel-crud-api.git`
- `cd laravel-crud-api`
- `docker-compose build`
- `docker-compose up -d`
- `docker-compose exec php-fpm composer install`
- `docker-compose exec php-fpm php artisan key:generate`
- `docker-compose exec php-fpm php artisan migrate --seed`

## Run app with local
- `git clone https://github.com/OlegMarko/laravel-crud-api.git`
- `cd laravel-crud-api`
- `composer install`
- `cp .env.exaple .env`
- `php artisan key:generate`
- `php artisan migrate --seed`
- `php artisan serve --port=8000`
    
