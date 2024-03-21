@extends('layouts.app')
@section('content')

    <div class="container">
    <div class="row">
      @foreach ($albums as $album)
        
     
      <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="/storage/album_covers/{{ $album->cover_image }}" alt="{{ $album->cover_image }}" height="250px">
                <div class="card-body">
                  <p class="card-text">{{ $album->description }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/albums/{{ $album->id }}" class="btn btn-sm btn-outline-secondary">View</a>
                     
                    </div>
                    <small class="text-muted">{{ $album->name }}</small>
                  </div>
                </div>
              </div>
      </div>
        @endforeach
      </div>
    </div>
    
@endsection