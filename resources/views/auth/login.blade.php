@extends('base/layout')

@section('title', 'Login')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-5">
      <article class="card mt-4">
        <div class="card-header text-center">
          <h5 class="card-title">Login</h5>
        </div>
        <div class="card-body">
          <ul>
            @forelse ($errors->all() as $error)
              <li>{{$error}}</li>
            @empty
            @endforelse
          </ul>
          <form action="{{route('authenticate')}}" method="post">
            @csrf
            <div class="form-group mb-4">
              <label for="email">Email: </label>
              <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group mb-4">
              <label for="email">Password: </label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="text-center">
              <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancel</a>
              <button type="submit" class="btn btn-primary">login</button>
              <p class="mt-5">Do you not have an account? <a href="{{route('register')}}">Register here</a>...</p>
            </div>
          </form>
        </div>
      </article>
    </div>
  </div>
</div>

@endsection