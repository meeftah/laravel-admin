# Laravel - Admin (Laravel 8.*)

## Introduction
This admin panel is a personal project that I use frequently in almost every web application I create

## Features
- User, Role & Permission Manager
- UUID as primary key

## Installation
Clone the repo and follow below steps.

1. Run composer install
2. Copy .env.example to .env Example for unix users : cp .env.example .env
3. Set valid database credentials of env variables 
   ```
   DB_DATABASE 
   DB_USERNAME
   DB_PASSWORD
   ```
4. Run php artisan key:generate to generate application key
5. Run php artisan migrate
6. Run php artisan db:seed to seed your database
7. Run php artisan serve

That's it, Open http://localhost:8000/login and login
```
email: superadmin@email.com
pass: 123456
```

## Other
Thanks to these plugins and services
- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)
- [Spatie for roles and permissions](https://github.com/spatie/laravel-permission)
- [Goldspecdigital UUID support for the IDs](https://github.com/goldspecdigital/laravel-eloquent-uuid)
- [AdminLTE 3](https://github.com/ColorlibHQ/AdminLTE)

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
