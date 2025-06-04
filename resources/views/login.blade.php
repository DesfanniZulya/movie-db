@extends('layouts.template')
@section('content')

<style>
    body {
        background: linear-gradient(to bottom, #bbdefb, #e3f2fd); /* gradasi biru muda ke biru pastel */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card-form {
        max-width: 450px;
        margin: 60px auto;
        padding: 30px;
        border-radius: 15px;
        background-color: #ffffff;
        box-shadow: 0 10px 25px rgba(30, 136, 229, 0.2); /* bayangan biru */
        border: 1px solid #bbdefb;
    }

    .form-label {
        font-weight: 600;
        color: #1565c0; /* biru tua */
    }

    .form-control {
        border: 2px solid #90caf9;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #42a5f5;
        box-shadow: 0 0 0 0.2rem rgba(66, 165, 245, 0.25);
    }

    .btn-primary {
        background-color: #1e88e5; /* biru utama */
        border: none;
    }

    .btn-primary:hover {
        background-color: #1565c0;
    }

    .text-danger {
        font-size: 0.875em;
    }

    .form-text {
        color: #607d8b;
    }
</style>

<div class="card-form">
    <h3 class="text-center mb-4" style="color: #1565c0;">Login ke Akunmu</h3>
    <form action="/login" method="post">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email"
                   name="email"
                   id="email"
                   class="form-control @error('email') is-invalid @enderror"
                   aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Email kamu aman bersama kami 🔒</div>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password"
                   name="password"
                   class="form-control"
                   id="exampleInputPassword1">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox"
                   class="form-check-input"
                   id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Ingat saya 💙</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>
</div>

@endsection
