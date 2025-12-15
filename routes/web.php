<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FavoriteController;


// landing & dashboard
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

// property
Route::resource('property', PropertyController::class)
    ->only(['index', 'show']);


// role: user middleware
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/favorite', [FavoriteController::class, 'showAll'])->name('showFavorite');

    Route::post('/favorite/{property}', [FavoriteController::class, 'store'])
    ->name('favorite.store');
    
    Route::delete('/favorite/{property}', [FavoriteController::class, 'destroy'])
    ->name('favorite.remove');
    
    Route::get('/payment/{id}', [PropertyController::class, 'payment'])->name('payment');

    Route::post('/payment/{id}', [PropertyController::class, 'purchase'])->name('checkout');
    
});

// role: admin middleware
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('adminDashboard');

        Route::resource('property', PropertyController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    });


// Role: tamu saat ingin login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
