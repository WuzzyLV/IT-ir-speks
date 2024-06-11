<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
})->name('landing');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view("pages.dashboard"); })->name('dashboard');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard/users', function () { return view('pages.admin.users'); })
            ->name('users');
        Route::get('/dashboard/users/new', [UserController::class, "new"])
            ->name('new-user');
        Route::post('/dashboard/users/new', [UserController::class, "handleNew"])
            ->name('handle-new-user');

        Route::get('/dashboard/users/{id}', [UserController::class, "edit"])
            ->name('edit-user');
        Route::post('/dashboard/users/{id}', [UserController::class, "handleEdit"])
            ->name('handle-edit-user');
        Route::delete('/dashboard/users/{id}', [UserController::class, "destroy"])
            ->name('delete-user');
    });


    Route::get('/dashboard/vacancies', function () {return view('pages.admin.vacancies'); })
        ->name('admin-vacancies');

    Route::get('/dashboard/vacancies/new', [VacancyController::class, 'new'])
        ->name('new-vacancy');

    Route::get('/dashboard/vacancies/{id}', [VacancyController::class, 'edit'])
        ->name('edit-vacancy');

    Route::get('/dashboard/news', function () {return view('pages.admin.news');})
        ->name('admin-news');

    Route::get('/dashboard/news/new', [NewsController::class, 'new'])
        ->name('new-news');
    Route::post("/dashboard/news/new", [NewsController::class, 'handleNew']);

    Route::get('/dashboard/news/{id}', [NewsController::class, 'edit'])
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
