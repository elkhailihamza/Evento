<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/register', 'showRegister')->name('register');
    Route::get('/forgotten', 'showForgotten')->name('forgotten');
    Route::post('/forgotten/send', 'forgotten')->name('forgotten.send');
    Route::post('/login/send', 'login')->name('login.send');
    Route::post('/register/send', 'register')->name('register.send');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::controller(EventController::class)->group(function() {
        Route::get('/events', 'index')->name('events');
        Route::get('/events/get', 'getEvents');
        Route::get('/events/search', 'search');
        Route::post('/events/store', 'store')->name('events.store');
    });
    Route::controller(CategoryController::class)->group(function() {
        Route::get('/categories/get', 'getCategories');
    });
});
