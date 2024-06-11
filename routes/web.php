<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
})->name('landing');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view("pages.dashboard"); })->name('dashboard');

    Route::get('/dashboard/users', function () { return view('pages.admin.users'); })
        ->name('users');
    Route::get('/dashboard/users/{id}', function ($id) { return view('pages.admin.forms.edit-user',['id' => $id]); })
        ->name('edit-user');

    Route::get('/dashboard/vacancies', function () {return view('pages.admin.vacancies'); })
        ->name('admin-vacancies');
    Route::get('/dashboard/vacancies/{id}', function ($id) {return view('pages.admin.forms.edit-vacancy',['id' => $id]);})
        ->name('edit-vacancy');

    Route::get('/dashboard/news', function () {return view('pages.admin.news');})
        ->name('admin-news');
    Route::get('/dashboard/news/{id}', function ($id) {return view('pages.admin.forms.edit-news',['id' => $id]);})
        ->name('edit-news');

    Route::get('/dashboard/applications', function () {return view('pages.admin.applications');})
        ->name('applications');
    Route::get('/dashboard/applications/{id}', function ($id) {return view('pages.admin.application',['id' => $id]);})
        ->name('view-application');
});


Route::get('/vacancies', function () {
    return view('pages.vacancies.vacancies');
})->name('vacancies');

Route::get('/vacancies/{id}', function ($id) {
    return view('pages.vacancies.vacancy-page', ['id' => $id]);
})->name('vacancy');

Route::get('/news', function () {
    return view('pages.news.news');
})->name('news');

Route::get('/news/{id}', function ($id) {
    return view('pages.news.news-page', ['id' => $id]);
})->name('news-page');

Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about-us');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
