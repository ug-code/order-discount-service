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
![image](https://github.com/user-attachments/assets/f474bf1b-d41c-40e6-9a23-d4dc50613c70)
![image](https://github.com/user-attachments/assets/d3b39d0d-afdc-4d92-9302-61444a6bee1d)
![image](https://github.com/user-attachments/assets/b5555315-18bc-4a31-ab18-864812533418)



