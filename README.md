# LARABREEDS

A simple project with [Laravel](https://laravel.com/) and [Dog CEO API](https://dog.ceo/dog-api/)

### Get started!

<small>Step by Step guide to run LaraBreeds</small>

#### Step 01:

Install [Docker](https://www.docker.com/) and [Docker Desktop](https://www.docker.com/products/docker-desktop) if you're using windows or mac for run the project.

Or you can run the project if use [Composer](https://getcomposer.org/) directly.

#### Step 02:

Clone the repo [here](https://github.com/AleejandroReyna/larabreeds).

#### Step 03:

Get PHP dependencies with `php composer.phar install`. 

#### Step 04:

Set the enviroment variables with the access to DB copying the .env.example and rename with .env

#### Step 05:

If you're using Docker and you want to use sail, you can run the command `./vendor/bin/sail up` to create the containers and set up the development enviroment.

If you're using only composer, you can use the command `php artisan serve`

#### Step 06:

Run the migrations with the command `php artisan migrate` (If you're using docker, you need to run this command into the running container with larabreeds service.)

#### Step 07:

Run the seeds with the command `php artisan db:seed` (If you're using docker, you need to run this command into the running container with larabreeds service.)

#### Step 08:

Give me a star on [Github ](https://github.com/AleejandroReyna/larabreeds).

#### Step 09:

That's it all! Your server is working. ( :
