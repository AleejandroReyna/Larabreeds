@extends('base/layout')

@section('content')

<div class="bg-light bg-gradient py-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Laravel Breeds</h1>
        <p class="lead">A simple breed list project with 
          <a href="https://laravel.com/" target="_blank">Laravel</a> and 
          <a href="https://dog.ceo/dog-api/" target="_blank">DOG CEO API</a>!</p>
        <hr class="my-4">
        <p>The dogs are funny and cute, use this project if do you wanna save your favorite breeds in cloud.</p>
        <a class="btn btn-primary" href="https://github.com/AleejandroReyna/larabreeds" target="_blank"
            role="button"><i class="bi bi-github"></i> Go to Github</a>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col text-center my-5">
            <h3>Get started!</h3>
            <small>Step by Step guide to run Django Todo list</small>
        </div>
    </div>
    <div class="row">
        <div class="col">
          <h4 id="step-01-">Step 01:</h4>
          <p>Install <a target="_blank" href="https://www.docker.com/">Docker</a> and <a target="_blank" href="https://www.docker.com/products/docker-desktop">Docker Desktop</a> if you&#39;re using windows or mac for run the project.</p>
          <p>Or you can run the project if use <a target="_blank" href="https://getcomposer.org/">Composer</a> directly.</p><br>
          
          <h4 id="step-02-">Step 02:</h4>
          <p>Clone the repo <a target="_blank" href="https://github.com/AleejandroReyna/larabreeds">here</a>.</p><br>
          
          <h4 id="step-03-">Step 03:</h4>
          <p>Set the enviroment variables with the access to DB copying the .env.example and rename with .env</p><br>
          
          <h4 id="step-04-">Step 04:</h4>
          <p>If you're using Docker and you want to use sail, you can run the command <code>./vendor/bin/sail up</code> to create the containers and set up the development enviroment.</p>
          <p>If you're using only composer, you can use the command to get PHP dependencies with <code>php composer.phar install</code> and run <code>php artisan serve</code></p><br>
          
          <h4 id="step-05-">Step 05:</h4>
          <p>Run the migrations with the command <code>php artisan migrate</code> (If you're using docker, you need to run this command into the running container with larabreeds service.)</p><br>
          
          <h4 id="step-06-">Step 06:</h4>
          <p>Run the seeds with the command <code>php artisan db:seed</code> (If you're using docker, you need to run this command into the running container with larabreeds service.)</p><br>
          
          <h4 id="step-07-">Step 07:</h4>
          <p>Give me a star on <a href="https://github.com/AleejandroReyna/larabreeds">Github <i class="bi bi-github"></i></a>.</p><br>
          
          <h4 id="step-08-">Step 08:</h4>
          <p>That's it all! Your server is working. ( :</p><br>
        </div>
    </div>
</div>

@endsection