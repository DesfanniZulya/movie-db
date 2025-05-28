@extends('layouts.template')

@section('title', 'Data Movie')

@section('content')
<h2>Data Movie</h2>

{{-- Tombol Tambah Data --}}
<div class="mb-3">
    <a href="{{ route('movie.createe') }}" class="btn btn-primary">+ Tambah Data</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Category</th>
            <th>Year</th>
            <th>Actors</th>
            <th>Cover</th>
            <th>Aksi</th> {{-- Kolom aksi --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($movies as $index => $movie)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->category->category_name ?? '-' }}</td>
            <td>{{ $movie->year }}</td>
            <td>{{ $movie->actors }}</td>
            <td>
                @if ($movie->cover_image)
                <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}" width="80" />
                @else
                -
                @endif
            </td>
            <td>
                {{-- Tombol Edit --}}
                <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                
                {{-- Tombol Delete dengan form --}}
                <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" class="d-inline" 
                      onsubmit="return confirm('Yakin hapus movie {{ $movie->title }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
