@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add new photo</h2>
    <form method="POST" action="/photos/store" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="album_id" value="{{ $albumId }}">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title"  placeholder="Enter title">
        </div>
        <div class="form-group">
        <label for="discription">Discription</label>
        <input type="text" class="form-control" id="discription" name="discription"  placeholder="Enter discription">
      </div>
      <div class="form-group">
      <label for="photo">Photo</label>
      <input type="file" class="form-control" id="photo" name="photo">
    </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
    </div>
@endsection