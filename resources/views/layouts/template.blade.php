<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container py-5">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($movies as $movie)
          <div class="col">
            <div class="card h-100">
              <img src="{{ $movie->cover_image }}" class="card-img-top" alt="{{ $movie->title }}">
              <div class="card-body">
                <h5 class="card-title">{{ $movie->title }}</h5>
                <p class="card-text">{{ Str::limit($movie->synopsis, 100) }}</p>
                <p class="text-muted"><strong>Tahun:</strong> {{ $movie->year }}</p>
                <p class="text-muted"><strong>Pemeran:</strong> {{ $movie->actors }}</p>
                <a href="#" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>