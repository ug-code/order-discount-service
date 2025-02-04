# order-discount-service

DB setting
```shell
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```


```shell
composer install 
```
If you want docker install
```shell
docker-compose up -d --build

//use artisan command
docker-compose exec app bash

http://127.0.0.1:3000

```

If you want without docker
```shell
When working with Docker as the database, this line needs to be changed when running Artisan.Change .env file
DB_HOST=locahost

php artisan serve
http://127.0.0.1:8000
```

migration
```shell
php artisan migrate --seed

```
documentation page
http://127.0.0.1:8000/request-docs
![image](https://github.com/user-attachments/assets/698557b1-92f8-4619-be38-bf8e8a411914)
