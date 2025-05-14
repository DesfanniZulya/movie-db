@extends('layouts.template')

@section('title','Form input movie')

@section('content')

  {{-- form movie --}}

    <h1>Form Data Movie</h1>
    <form action="/movie/store" method="POST" enctype="multipart/form-data">
        <div class="mb-3 row">
       <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
     <input type="text" readonly class="form-control" id="title" name="title" required>
  </div>
   </div>

<div class="mb-3 row">
  <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
  <div class="col-sm-10">
    <textarea class="form-control" id="synopsis" name="synopsis" rows="10"></textarea>
  </div>
</div>
    </form>

@endsection