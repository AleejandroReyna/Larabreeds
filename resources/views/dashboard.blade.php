@extends('base/layout')

@section('title', 'Dashboard')

@section('content')

  <h1>Dashboard</h1>

  @forelse ($breeds as $breed)
    <div>
      <img src="{{$breed->thumbnail}}" alt="">
      <h3>{{$breed->name}}</h3>
    </div>
  @empty
    <div>no hay</div>
  @endforelse

@endsection