Laravel Socialite Login
=======================

This is a Laravel application that provides social login functionality using Github and Google.

Features
--------

*   Login with Github account
*   Login with Google account

Requirements
------------

*   PHP 7.3 or higher
*   Laravel 8.0 or higher
*   MySQL
*   Github and Google API credentials

Installation
------------

*   Clone the repository: `git clone https://github.com/ikamal7/Laravel-Socialite-Login.git`
*   Install dependencies: `composer install`
*   Copy the example env file and make the required configuration changes in the .env file: `cp .env.example .env`
*   Generate an app encryption key: `php artisan key:generate`
*   Create a database and inform the settings in the .env file
*   Run migrations: `php artisan migrate`
*   Create Github and Google API credentials and update the respective settings in the .env file
*   Start the development server: `php artisan serve`

The application will be available at `http://localhost:8000`.

License
-------

This project is open-sourced software licensed under the \[MIT license\]([https://opensource](https://opensource).
