@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{ $photo->title }}</h3>
        <p>{{ $photo->description }}</p>
        <form action="/photos/delete/{{ $photo->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger float-end">Delete</button>
        </form>
        <a href="/albums/{{ $photo->album->id }}" class="btn btn-info">Go Back</a>
        <small>Size {{ $photo->size }}</small>
        <hr>
        <img src="/storage/album/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->photo }}" width="100%">
        <hr>
        
    </div>
@endsection