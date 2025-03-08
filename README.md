
# Base Laravel
  It's a Laravel project set up with Docker containers to make development super smooth.

## Usage/Examples  
~~~javascript  
Access the Laravel folder

Copy and paste the .env.example file

Rename .env.example.copy to .env

~~~  
## Run Locally  
Initialize docker containers

~~~bash  
docker compose up -d
~~~

Go to the laravel container bash 

~~~bash  
docker compose exec laravel bash
~~~

Install dependencies in laravel container

~~~bash  
composer install
~~~

Generate laravel keys in laravel container

~~~bash  
php artisan key:generate
~~~  
Run migrations in laravel container

~~~bash  
php artisan migrate
~~~  
Access your laravel project

~~~bash  
Your project as running on Address: localhost:8080
~~~  

Your project as run ! =)

