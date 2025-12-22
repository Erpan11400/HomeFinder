<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PurchasementController;

// landing & dashboard
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');



// role: user middleware
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/favorite', [FavoriteController::class, 'showAll'])->name('showFavorite');

    Route::post('/favorite/{property}', [FavoriteController::class, 'store'])
    ->name('favorite.store');
    
    Route::delete('/favorite/{property}', [FavoriteController::class, 'destroy'])
    ->name('favorite.remove');
    
    Route::get('/payment/{id}', [PurchasementController::class, 'payment'])->name('payment');

    Route::post('/payment', [PurchasementController::class, 'purchase'])->name('checkout');

    Route::get('/historyPurchasement/{id}', [PurchasementController::class, 'historyPurchasement'])->name('history');

    // property
    Route::resource('/property', PropertyController::class)
        ->only(['index', 'show']);

    // list property    
    Route::get('/properties', [PropertyController::class, 'list'])->name('properties.list');
    
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



// route: ganti bahasa id/en
Route::get('/lang/{locale}', function ($locale) {

    if (! in_array($locale, ['en', 'id'])) {
        abort(400);
    }

    // session utk menyimpan prefernsi bahasa
    session(['locale' => $locale]);

    return back();
})->name('lang.switch');




// Navbar page:     
Route::get('/services', [PageController::class, 'services']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::post('/contact', [PageController::class, 'submitContact'])
    ->name('contact.submit');
