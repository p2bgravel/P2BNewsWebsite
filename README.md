#News Website

###Requirements 
[Install xampp/php](https://www.apachefriends.org/download.html)

[Install composer](https://getcomposer.org/download/)

###Setup:

#####Initial:
- Install package:
> composer install

- setup .env:
    
  - Create new .env file from .env.example
  - Configure those lines base on local mysql:
  
   ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```
- setup jwt-auth
    - generate secret key:
        > php artisan jwt:secret

#####Generate:
- Application key:
> php artisan key:generate
###Migrate DB:
- Migrate database:
> php artisan migrate

- Seed data:
> php artisan db:seed

###Start:
 - Start project
 >php artisan serve

###References:
- PHP version: 7.2.17
- Laravel version: 5.8.23
- Composer version:  1.8.5 
- Laratrust (roles permission) docs: [click here](https://laratrust.santigarcor.me/docs/5.2/)
- Jwt-Auth for laravel docs: [click here](https://github.com/tymondesigns/jwt-auth/wiki)
- Database diagram : 
   [click here](https://dbdiagram.io/d)
   
- Feature list:
   [click here](https://docs.google.com/spreadsheets/d/1TFkghfz0FBN7LW4tB7_G59cla6X2Wb6snw6Ga4Je2tM/edit)
 ###Tutorials:
 - setup jwt-auth:
    - [click here](https://medium.com/@pramestyan/simple-user-authentication-api-with-laravel-and-jwt-authentication-384b4edbe76c)
 
 ###Issues:
 - jwt-auth dependence with nesbot/carbon version problem:
    - https://github.com/tymondesigns/jwt-auth/issues/1795