@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create new album</h2>
    <form method="POST" action="/albums/store" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name">
        </div>
        <div class="form-group">
        <label for="discription">discription</label>
        <input type="text" class="form-control" id="discription" name="discription"  placeholder="Enter discription">
      </div>
      <div class="form-group">
      <label for="cover_image">Cover Image</label>
      <input type="file" class="form-control" id="cover_image" name="cover_image">
    </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
    </div>
@endsection