<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [MovieController::class, 'index']);

Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail_movie']);

Route::get('/movie/create', [MovieController::class, 'create'])->middleware('auth');

Route::post('/movie/store', [MovieController::class, 'store'])->middleware('auth');

Route::get('/login', [AuthController::class, 'formLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/datamovie', [MovieController::class, 'datamovie'])->name('datamovie');

Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->name('movie.edit');

Route::put('/movie/{id}/update', [MovieController::class, 'update'])->name('movie.update');

Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->name('movie.destroy');

// Route create manual dengan nama berbeda
Route::get('/movie/createe', [MovieController::class, 'create'])->name('movie.createe');


?>