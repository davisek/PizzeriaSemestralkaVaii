<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
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


// Static Pages
// Index About Page
Route::get('/', [PizzaController::class, 'aboutPage']);
// Index Services Page
Route::get('/services', [PizzaController::class, 'servicesPage']);

// Theme Dynamic Pages
// All Pizzas
Route::get('/daily_menu', [PizzaController::class, 'index']);
// All Not Favorite Pizza
Route::get('/api/pizzas', [PizzaController::class, 'allNotFavorite'])->middleware('auth');
// Index Favorite Pizzas
Route::get('/favorites', [FavoriteController::class, 'index'])->middleware('auth');
// Get Favorite Pizzas
Route::get('/api/favorites', [FavoriteController::class, 'favoritePizzas'])->middleware('auth');
// Delete Favorite Pizza
Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])->middleware('auth');
// Store Favorite Pizza
Route::post('/api/storeFavoritePizza', [FavoriteController::class, 'store']);



// Get All Reviews
Route::get('/reviews', [ReviewController::class, 'index']);
// Store New Review
Route::post('/addReview', [ReviewController::class, 'store']);

// Edit Settings Form
Route::get('/settings', [UserController::class, 'settings'])->middleware('auth');
// Update Private Information
Route::put('/users/private', [UserController::class, 'updatePrivate'])->middleware('auth');
// Update Password
Route::put('/users/password', [UserController::class, 'updatePassword'])->middleware('auth');
// Create Registration Form
Route::get('/registration', [UserController::class, 'registration'])->middleware('guest');
// Store New User
Route::post('/register', [UserController::class, 'store']);
// Create Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Log In User
Route::post('/authenticate', [UserController::class, 'authenticate']);
// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
