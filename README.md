
## Requirements 
Install xampp/php : https://www.apachefriends.org/download.html

Install composer : https://getcomposer.org/download/

## Setup:

### Initial: 
- Install package:

``` composer install ```

- setup .env:
    
Create new file from .env.example

Configure those lines base on local mysql:
```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database_name
    DB_USERNAME=root
    DB_PASSWORD=
```

### Generate:
- Application key:

> php artisan key:generate

## Migrate DB: 

- Migrate database:

> php artisan migrate

- Seed data:

> php artisan db:seed

## Start: 

 - Start project
 
 >php artisan serve

## References: 

- PHP version: 7.2.17
- Laravel version: 5.8.23
- Composer version:  1.8.5 

- Database diagram : 
  https://dbdiagram.io/d
   
- Feature list:
  https://drive.google.com/file/d/1lclMY-LT7rIzQzrM7Wq5zqb61x8QhXSF/view?usp=sharing
