@extends('layouts.template')

@section('title', 'Detail Movie')

@section('content')
<style>
    body {
        background: #e8f0fa; /* Biru muda soft */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        background: #f4f8fc; /* Biru-putih sangat terang */
        border: 2px solid #1e88e5; /* Biru utama */
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(30, 136, 229, 0.2);
    }

    h1, h2, h5 {
        color: #0d47a1; /* Biru tua elegan */
        font-weight: 700;
    }

    p {
        color: #2c3e50; /* Abu kebiruan */
        font-size: 1.05rem;
    }

    hr {
        border-color: #90caf9; /* Biru pastel */
        border-width: 2px;
    }

    .btn-secondary {
        background-color: #1e88e5;
        border-color: #1565c0;
        font-weight: bold;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #1565c0;
        border-color: #0d47a1;
    }

    .cover-image {
        width: 120px;
        height: auto;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 0 10px #1e88e5aa;
        margin-top: 15px;
    }

    .content-wrapper {
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        padding: 20px 30px;
        background-image: url('https://www.transparenttextures.com/patterns/stardust.png');
        background-repeat: repeat;
        border-radius: 15px;
        box-shadow: 0 6px 12px rgba(13, 71, 161, 0.15);
    }
</style>

@if ($movie)
    <h1 class="mb-4 text-center">Detail Movie</h1>

    <div class="card content-wrapper">
        <div class="text-center">
            <img src="{{ asset($movie->cover_image) }}" alt="{{ $movie->title }}" class="cover-image">
        </div>
        <div class="card-body">
            <h2 class="card-title text-center">{{ $movie->title }}</h2>
            <p class="text-muted mb-2 text-center">
                <strong>Category:</strong> {{ $movie->category->category_name ?? '-' }}
            </p>
            <p class="mb-2 text-center">
                <strong>Actors:</strong> {{ $movie->actors }}
            </p>
            <p class="mb-2 text-center">
                <strong>Year:</strong> {{ $movie->year }}
            </p>
            <hr>
            <h5>Synopsis</h5>
            <p>{{ $movie->synopsis ?: 'No synopsis available.' }}</p>

            <div class="text-center">
                <a href="{{ route('dataMovie') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-warning" role="alert">
        Data movie tidak ditemukan.
    </div>
    <a href="{{ route('dataMovie') }}" class="btn btn-danger">Kembali</a>
@endif
@endsection
