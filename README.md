#instalation

-php artisan  storage:link

composer require barryvdh/laravel-debugbar --dev
composer require laravel/telescope
php artisan telescope:install
php artisan migrate

#deploy