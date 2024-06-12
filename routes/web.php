<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;
use App\Models\Vacancy;

Route::get('/', function () {
    return view('pages.landing');
})->name('landing');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view("pages.dashboard");
    })->name('dashboard');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard/users', [UserController::class, "view"])
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

        Route::get('/dashboard/news', [NewsController::class, 'adminNews'])->name('admin-news');

        Route::get('/dashboard/news/new', [NewsController::class, "new"])
            ->name('new-news');
        Route::post('/dashboard/news/new', [NewsController::class, "handleNew"])
            ->name('handle-new-news');

        Route::get('/dashboard/news/{id}', [NewsController::class, "edit"])
            ->name('edit-news');
        Route::post('/dashboard/news/{id}', [NewsController::class, "handleEdit"])
            ->name('handle-edit-news');
        Route::delete('/dashboard/news/{id}', [NewsController::class, "destroy"])
            ->name('delete-news');

        Route::get('/dashboard/vacancies', [VacancyController::class, 'viewCards'])
            ->name('admin-vacancies');
        Route::get('/dashboard/vacancies/new', [VacancyController::class, "new"])
            ->name('new-vacancy');
        Route::post('/dashboard/vacancies/new', [VacancyController::class, "handleNew"])
            ->name('handle-new-vacancy');

        Route::get('/dashboard/vacancies/{id}', [VacancyController::class, "edit"])
            ->name('edit-vacancy');
        Route::post('/dashboard/vacancies/{id}', [VacancyController::class, "handleEdit"])
            ->name('handle-edit-vacancy');
        Route::delete('/dashboard/vacancies/{id}', [VacancyController::class, "destroy"])
            ->name('delete-vacancy');
    });

    Route::get('/dashboard/applications', function () {
        return view('pages.admin.applications');
    })
        ->name('applications');

    Route::get('/dashboard/applications/{id}', [ApplicationController::class, "view"])
        ->name('view-application');

    Route::delete('/dashboard/applications/{id}', [ApplicationController::class, "destroy"])
        ->name('delete-application');

    //    Route::get('/dashboard/applications/{id}/cv', [CVController::class, "view"])
//        ->name('cv-application');
    Route::get('/dashboard/applications/{id}/cv', [CVController::class, "view"])
        ->name('cv-application');

});


Route::get('/vacancies', function () {
    return view('pages.vacancies.vacancies');
})->name('vacancies');

Route::get('/vacancies/{id}', [VacancyController::class, "view"])->name('vacancy');

Route::post('/vacancies/{id}', [ApplicationController::class, "apply"])->name('apply');

Route::get('/news', function () {
    return view('pages.news.news');
})->name('news');

Route::get('/news/{id}', [NewsController::class, "view"])->name('news-page');

Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about-us');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
