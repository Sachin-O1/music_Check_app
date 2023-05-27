<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/filter', [HomeController::class, 'filter'])->name('filter');
Route::get('/search', [HomeController::class, 'search'])->name('events.search');
Route::get('/filter', [HomeController::class, 'filter'])->name('events.filter');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('genres', GenreController::class);
    Route::resource('artists', ArtistController::class);
    Route::resource('venues', VenueController::class);
    Route::resource('events', EventController::class);
    Route::post('/login', 'AuthController@login')->name('login');


});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
