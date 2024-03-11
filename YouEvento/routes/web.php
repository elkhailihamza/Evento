<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserValidationController;
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
    Route::controller(EventController::class)->group(function () {
        Route::get('/events', 'index')->name('events');
        Route::get('/events/view/{event}', 'viewEvent')->name('viewEvent');
        Route::get('/events/search', 'search');
    });
    Route::controller(ReservationController::class)->group(function () {
        Route::get('/reservations', 'index')->name('reservations');
        Route::post('/reservations/{event}/store', 'store')->name('reservation.store');
    });

    Route::controller(TicketController::class)->group(function () {
        Route::get('/tickets/get', 'getTickets');
        Route::get('/tickets/info/get', 'getTicketInfo');
        Route::post('/tickets/{event}/store', 'store')->name('tickets.store');
    });
    Route::get('/categories/get', [CategoryController::class, 'getCategories']);

    Route::middleware('organisateur')->group(function () {
        Route::controller(EventController::class)->group(function () {
            Route::get('/events/get', 'getEvents');
            Route::get('/events/{event}/statistics', 'viewStatistics')->middleware('checkUserIdForEvent')->name('events.statistics');
            Route::post('/events/store', 'store')->name('events.store');
            Route::post('/events/update', 'update')->name('events.update');
        });
        Route::controller(UserValidationController::class)->group(function() {
            Route::get('/events/{event}/validation', 'index')->name('user.validation');
            Route::post('/events/{event}/validation/{user}/accept', 'accept')->name('user.validation.accept');
            Route::post('/events/{event}/validation/{user}/decline', 'decline')->name('user.validation.decline');
        });
    });
    Route::middleware('admin')->group(function() {
        Route::controller(AdminController::class)->group(function() {
            Route::get('/dashboard/home', 'index')->name('admin.index');
            Route::get('/dashboard/events', 'events')->name('admin.events');
            Route::post('/dashboard/events/{event}/approve', 'approve')->name('admin.approve');
            Route::post('/dashboard/events/{event}/decline', 'decline')->name('admin.decline');
            Route::get('/dashboard/permissions', 'permissions')->name('admin.permissions');
            Route::post('/dashboard/permissions/{user}/ban', 'ban')->name('admin.permissions.ban');
            Route::get('/dashboard/categories', 'categories')->name('admin.categories');
            Route::get('/dashboard/statistics', 'statistics')->name('admin.statistics');
        });
        Route::controller(CategoryController::class)->group(function() {
            Route::post('/dashboard/categories/create', 'store')->name('admin.categories.create');
            Route::post('/dashboard/categories/{category}/update', 'update')->name('admin.categories.update');
            Route::post('/dashboard/categories/{category}/destroy', 'destroy')->name('admin.categories.destroy');
        });
    });
});
