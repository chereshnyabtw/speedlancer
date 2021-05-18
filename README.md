## About Speedlancer
This is a freelance site written by me using the laravel php framework. At the moment there is only a portfolio system and registration with authorization.

## How-to debug it
First, you need to install all the composer dependencies:
`composer update`

After that, you need to set up the configuration file. To do this, you need to copy the `.env.example` or rename it to `.env`, and set the debug mode:
`cp /path_to_source/.env.example /path_to_source/.env`

set `APP_DEBUG=true`

After that, we can start our test web server:
`php artisan serve`
