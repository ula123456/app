#instalation

-php artisan  storage:link

composer require barryvdh/laravel-debugbar --dev
composer require laravel/telescope
php artisan telescope:install
php artisan migrate

#deploy


1.composer require laravel/breeze
2.php artisan breeze:install




echo "# laraProj" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/ula123456/laraProj.git
git push -u origin main


git remote add origin https://github.com/ula123456/laraProj.git
git branch -M main
git push -u origin main