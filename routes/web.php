<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/whoami', function () {
    return 'jefferson T. Panti | 2023-70946 | Block 4C | ITRACKB4 Laravel 12';
});


Route::get('/comics/feature', [ComicController::class, 'feature'])
    ->name('comics.feature');


Route::get('/comics/filter/{value?}', function ($value = null) {
    if ($value === null) {
        return redirect()->route('comics.index');
    }

    return redirect()->route('comics.index', [
        'genre' => $value,
    ]);
})->name('comics.filter');


Route::resource('comics', ComicController::class)
    ->middlewareFor(['create', 'store', 'edit', 'update', 'destroy'], 'auth');

Route::get('/register',  [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login',   [LoginController::class, 'create'])->name('login');
Route::post('/login',  [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
