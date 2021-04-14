@extends('base/layout')

@section('title', 'Dashboard')

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col"><h1 class="my-4">Dashboard</h1></div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row row-cols-4">
      @forelse ($breeds as $breed)
        <div class="col">
          <article class="card mb-4">
            <img src="{{$breed->thumbnail}}" class="card-img-top" alt="{{$breed->name }} image">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">{{$breed->name}}</h3>
                @if(Auth::user()->checkBreed($breed))
                  <a class="btn btn-outline-secondary" href="{{route('breeds.remove_breed_to_user', ['breed' => $breed])}}"><i style="color: gold;" class="bi-star-fill"></i></a>
                @else
                  <a class="btn btn-outline-secondary" href="{{route('breeds.add_breed_to_user', ['breed' => $breed])}}"><i class="bi-star-fill"></i></a>
                @endif
              </div>
              <ul>
                @forelse ($breed->subBreeds as $subBreed)
                  <li><a href="{{route('sub_breeds.show', ['sub_breed' => $subBreed])}}">{{$subBreed->category->name}}</a></li>
                @empty
                  <li>No available sub breeds...</li>
                @endforelse
              </ul>
              <a href="{{route('breeds.show', ['breed' => $breed])}}" class="btn btn-primary">View</a>
            </div>
          </article>
        </div>
      @empty
        <div>No available breeds...</div>
      @endforelse
    </div>
  </div>

@endsection