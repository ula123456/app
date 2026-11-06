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

Платформер-курьер по улицам Ташкента — учим английские слова по вывескам.

- Открыть: `/courier` (маршрут Laravel) или `public/tashkent-courier.html`. Прежняя версия с видом сверху: `/courier/city`.
- 4 маршрута: Chorsu → Amir Temur Square, Amir Temur Square → TV Tower, Independence Square → Railway Station, Paxtakor → Milliy Stadium.
- ⬇ вход в метро (настоящие станции и линии ташкентского метро) и подземные переходы; лестницы вверх — путепроводы и надземная линия Halqa.
- Заказ на русском → найди магазин с английской вывеской → донеси до достопримечательности вовремя. Деньги — на экипировку.
- Управление как в классических платформерах: ←/→ идти, B (Shift/X) бежать, A (Пробел/Z/↑) прыжок — держи дольше, чтобы прыгнуть выше; ↓ войти, F подсказка, Esc пауза. На телефоне — крестовина и кнопки A/B.
