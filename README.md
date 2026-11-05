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

# 🛵 Tashkent Courier (игра)

Симулятор курьера в стиле top-down GTA по стилизованной карте Ташкента — учим английские слова по вывескам.

- Открыть: `/courier` (маршрут Laravel) или напрямую `public/tashkent-courier.html` в браузере.
- Заказ приходит на русском («пирожное 🍰») — ищи английскую вывеску (BAKERY → TakeCake, BUBBLE TEA → WeDrink…).
- Доставил вовремя — деньги (сум) в кошелёк; покупай кепку, куртку, термосумку, велосипед, самокат, скутер.
- Управление: WASD/стрелки, M — карта, B — экипировка, N — словарь, F — подсказка; на телефоне — джойстик.
