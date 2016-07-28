# Laranews - Simple News Management Built With Laravel

Laranews is a simple apps built with laravel for news management. This apps is built for demo in PHP Jogloraya Meetup talking about laravel.

Laranews adalah sebuah aplikasi manajemen berita/artikel sederhana yang dibangun dengan laravel. Aplikasi ini dibuat untuk demo dalam meetup PHP Jogloraya ke-9.

## How to Install

1. Clone/download this repo to your PC.
2. Run composer install from your application root directory to install laravel & it's dependencies.
3. Grab a copy of .env file from [here](https://github.com/laravel/laravel/blob/master/.env.example), rename it to .env and place it on your application root directory. Change your database configuration in here.
4. Run php artisan key:generate to generate a new application key
3. Run php artisan migrate to run the migration. This will generate the table for the apps on your database.
4. Run php artisan db:seed to generate an admin user.
5. Run php artisan serve to use the php built in web server then acces it with (http://localhost:8000). Of coure if you use another web server such apache, just put your apps on the root directory of your web server, example /var/www/html and access it with (http://localhost/laranews/public)
6. You're done! 

## License

The laranews is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
