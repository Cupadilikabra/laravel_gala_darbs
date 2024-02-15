<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RatingController;
use App\Models\Rating;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});





Route::get('/board', function () {
    return view('blog');
})->middleware(['auth', 'verified'])->name('board');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'jobs'], function () {
    Route::get('/', 'App\Http\Controllers\JobController@index')->name('jobs.index');
    Route::get('/create', 'App\Http\Controllers\JobController@create')->name('jobs.create');
    Route::post('/', 'App\Http\Controllers\JobController@store')->name('jobs.store');
    Route::get('/{job}', 'App\Http\Controllers\JobController@show')->name('jobs.show');
    Route::get('/{job}/edit', 'App\Http\Controllers\JobController@edit')->name('jobs.edit');
    Route::put('/{job}', 'App\Http\Controllers\JobController@update')->name('jobs.update');
    Route::delete('/{job}', 'App\Http\Controllers\JobController@delete')->name('jobs.delete');
    Route::get('/user/posts', 'App\Http\Controllers\UserJobController@index')->name('user.posts');
    Route::post('/jobs/{job}/rate', [RatingController::class, 'rateJob'])->name('jobs.rate');
    Route::get('/jobs/sort', 'App\Http\Controllers\FilterController@sort')->name('jobs.sort');
});



require __DIR__ . '/auth.php';
