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

    Route::post('/favorite/{property}', [FavoriteController::class, 'store'])
        ->name('favorite.store');

});

// role: admin middleware

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('dashboard');

        // future admin routes
        // Route::resource('property', AdminPropertyController::class);
    });


// auth routes to view form
// Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);

// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


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



// Route::resource('/property', PropertyController::class);

// Sementara di comment


// feature routes
Route::get('/PropertyDetail', function () {
    return view('PropertyDetail');
});

// Route::get('/Register', function () {
//     return view('Register');
// });

// Route::get('/Login', function () {
//     return view('Login');
// });

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
