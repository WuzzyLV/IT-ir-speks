<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

Route::get('/dashboard/vacancies', function () {
    return view('admin-vacancies');
})->middleware(['auth', 'verified'])->name('admin-vacancies');

Route::get('/vacancies', function () {
    return view('vacancies');
})->name('vacancies');

Route::get('/vacancies/{id}', function ($id) {
    return view('vacancy-page', ['id' => $id]);
})->name('vacancy');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/news/{id}', function ($id) {
    return view('news-page', ['id' => $id]);
})->name('news-page');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
