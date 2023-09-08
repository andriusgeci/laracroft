# Laracroft Task Management App

- [Requirements](#requirements)
- [Basic Installation](#basic-installation)
- [Errors](#errors)


<a name="requirements"></a>
## Requirements

- [PHP 8+](https://www.php.net/manual/en/install.php)
- Windows [Laragon](https://laragon.org/) (it's same as xampp only better)
- Linux/Mac/Windows [Installation](https://laravel.com/docs/10.x/installation)


<a name="basic-installation"></a>
## Basic Installation

```
In this example I used Ubuntu 23.04 with Laravel/Sail but you can use anything of your choice.
cd <project dir>
git clone https://github.com/andriusgeci/laracroft.git
composer install
php artisan lara:setup which will create .env file, generate key, run yarn and npm.
setup your .env file DB_DATABASE, DB_USERNAME, DB_PASSWORD
=======================================
ONLY IF using Laravel/Sail : 
composer require laravel/sail --dev
php artisan sail:install
./vendor/bin/sail up
=======================================
if you are not using Larvel/Sail you will have to setup DB yourself.
php artisan migrate:fresh
insert dummy data: php artisan db:seed
```

## Errors
I have noticed when switching between windows and ubuntu sometimes css and js is not getting loaded.
If it's not working in resources/views/layouts/master.blade.php either add or remove public from assets here is example:
```
Without public:
<link rel="stylesheet" href="{{ asset('sidebar/css/style.css') }}">
<script src="{{ asset('sidebar/js/jquery.min.js') }}"></script>
<script src="{{ asset('sidebar/js/popper.js') }}"></script>
<script src="{{ asset('sidebar/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('sidebar/js/main.js') }}"></script>

With public:
<link rel="stylesheet" href="{{ asset('public/sidebar/css/style.css') }}">
<script src="{{ asset('public/sidebar/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/sidebar/js/popper.js') }}"></script>
<script src="{{ asset('public/sidebar/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/sidebar/js/main.js') }}"></script>
```
