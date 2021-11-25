<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Test for job

## Dependencies :

- [Php 8+](https://php.net).
- [Elasticsearch 7+](https://www.elastic.co/).

## Install project
  - Extrac project to disc and install composer dependence.
```bash
cd project_folder
composer install
```
- copy env.exempl to .env 
- edit .env set DB_NAME DB_USER DB_PASSWORD
- start Elasticsearch

### Pars jobs
``` Php
php artisan  crawl:jobs 
```
### Params to crawl
1.  --location[=LOCATION]  Location name [default: "bucuresti"]
2. --keyword[=KEYWORD]    Keyword [default: "symfony"]
