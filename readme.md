# Установка

Выполнить в консоли git
```bash
git clone git@github.com:djmitry/short-url.git short-url.loc
```

Зайти в папку short-url.loc и сменить настройки бд в файле .env для:
```bash
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Выполнить команды (из папки short-url.loc) в консоли composer
```bash
php artisan migrate
php artisan serve
```

Сервер запустится на http://127.0.0.1:8000