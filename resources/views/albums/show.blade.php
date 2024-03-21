@extends('layouts.app')
@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{ $album->name }}</h1>
        <p class="lead text-muted">{{ $album->description }}<p>
          <a href="/photos/create/{{ $album->id }}" class="btn btn-primary my-2">Upload Photo</a>
          <a href="/" class="btn btn-secondary my-2">Go Back</a>
        </p>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="row">
      @foreach ($album->photo as $photo)
     
      <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="/storage/album/{{ $album->id }}/{{ $photo->photo }}" alt="{{ $photo->photo }}" height="250px">
                <div class="card-body">
                  <p class="card-text">{{ $photo->description }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/photos/show/{{ $photo->id }}" class="btn btn-sm btn-outline-secondary">View</a>
                     
                    </div>
                    <small class="text-muted">{{ $photo->size }}</small>
                  </div>
                </div>
              </div>
      </div>
        @endforeach
      </div>
    </div>
@endsection