@extends('base/layout')

@section('title', 'Breed: ' . $breed->name)

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col"><h3 class="my-4">Breed Detail</h3></div>
    </div>

    <div class="row">
      <div class="col">
        <div class="card mb-4">
          <div class="card-header">
            <h5 class="card-title">Info: </h5>
          </div>
          <div class="card-body">
            <strong>Name: </strong><span>{{$breed->name}}</span><br />
            <strong>Sub Breeds: </strong>
            <ul>
              @forelse ($breed->subBreeds as $sub)
                <li><a href="{{route('sub_breeds.show', ['sub_breed' => $sub])}}">{{$sub->category->name}}</a></li>
              @empty
                <li>No available sub breeds...</li>
              @endforelse
            </ul>
            <strong>Actions: </strong>
            @if(Auth::user()->checkBreed($breed))
              <a class="btn btn-outline-secondary" href="{{route('breeds.remove_breed_to_user', ['breed' => $breed])}}">
                Unmark as Favorite <i style="color: gold;" class="bi-star-fill"></i>
              </a>
            @else
              <a class="btn btn-outline-secondary" href="{{route('breeds.add_breed_to_user', ['breed' => $breed])}}">
                Mark as Favorite <i class="bi-star-fill"></i>
              </a>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="card  bg-light">
          <div class="card-body">
            <div id="breedSlider" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                @forelse($images as $image)
                  @if ($loop->first)
                    <button type="button" data-bs-target="#breedSlider" data-bs-slide-to="{{$loop->index}}" class="active" aria-current="true" aria-label="Slide {{$loop->index}}"></button>
                  @else
                    <button type="button" data-bs-target="#breedSlider" data-bs-slide-to="{{$loop->index}}" aria-current="true" aria-label="Slide {{$loop->index}}"></button>
                  @endif
                @empty
                @endforelse
              </div>
              <div class="carousel-inner">
                  @forelse($images as $image)
                    @if ($loop->first)
                      <div class="carousel-item active text-center">
                    @else
                      <div class="carousel-item text-center">
                    @endif
                      <img src="{{$image}}">
                    </div>
                  @empty
                    <div>No Slider</div>
                  @endforelse
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#breedSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#breedSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection