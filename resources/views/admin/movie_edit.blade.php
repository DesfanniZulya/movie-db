@extends('layouts.template')

@section('title', 'Edit Movie')

@section('content')

<div class="card shadow-sm">
  <div class="card-header bg-success text-white">
    <h3 class="mb-0">Edit Data Movie</h3>
  </div>
  <div class="card-body">
    <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('datamovie') }}" class="btn btn-secondary">Kembali ke Data</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

        {{-- Title --}}
        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" 
                    value="{{ old('title', $movie->title) }}" placeholder="Masukkan judul movie" required>
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Synopsis --}}
        <div class="mb-3 row">
            <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
            <div class="col-sm-10">
                <textarea class="form-control @error('synopsis') is-invalid @enderror" id="synopsis" name="synopsis" rows="5" placeholder="Tulis sinopsis movie" required>{{ old('synopsis', $movie->synopsis) }}</textarea>
                @error('synopsis')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Category --}}
        <div class="mb-3 row">
            <label for="category_id" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                    <option value="" disabled>-- Pilih Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ (old('category_id', $movie->category_id) == $category->id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Year --}}
        <div class="mb-3 row">
            <label for="year" class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-10">
                <select class="form-select @error('year') is-invalid @enderror" id="year" name="year" required>
                    <option value="" disabled {{ old('year', $movie->year) ? '' : 'selected' }}>Pilih Tahun</option>
                    @php
                        $currentYear = date('Y');
                        for ($year = $currentYear; $year >= 1990; $year--) {
                            $selected = (old('year', $movie->year) == $year) ? 'selected' : '';
                            echo "<option value=\"$year\" $selected>$year</option>";
                        }
                    @endphp
                </select>
                @error('year')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Actors --}}
        <div class="mb-3 row">
            <label for="actors" class="col-sm-2 col-form-label">Actors</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('actors') is-invalid @enderror" id="actors" name="actors" placeholder="Contoh: Tom Holland, Zendaya" 
                    value="{{ old('actors', $movie->actors) }}" required>
                @error('actors')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Cover Image --}}
        <div class="mb-3 row">
            <label for="cover_image" class="col-sm-2 col-form-label">Cover Image</label>
            <div class="col-sm-10">
                @if ($movie->cover_image)
                    <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}" width="120" class="mb-2" />
                @endif
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti cover image</small>
                @error('cover_image')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </form>
  </div>
</div>

@endsection
