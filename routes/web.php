<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Routes pour afficher les pages
|--------------------------------------------------------------------------
*/

// Route pour afficher le formulaire de connexion
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route pour afficher le formulaire d'inscription
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

/*
|--------------------------------------------------------------------------
| Routes pour traiter les formulaires (envoi en POST)
|--------------------------------------------------------------------------
*/

// Route qui reçoit les données du formulaire de login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Route qui reçoit les données du formulaire d'inscription
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Route pour se déconnecter
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Tableaux de bord (Dashboards)
|--------------------------------------------------------------------------
*/

// Tableau de bord admin (protégé par notre middleware admin)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin')->name('admin.dashboard');

// Tableau de bord user (protégé par le middleware auth de Laravel)
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth')->name('user.dashboard');

/*
|--------------------------------------------------------------------------
| CRUD Produits (protégé par le middleware admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['admin'])->group(function () {
    Route::resource('products', ProductController::class);
});
