<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
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


// Theme Static Pages
Route::get('/', [PizzaController::class, 'aboutPage']);
Route::get('/services', [PizzaController::class, 'servicesPage']);

// Theme Dynamic Pages
Route::middleware('auth')->group(function () {
    // All Not Favorite Pizzas
    Route::get('/api/pizzas', [PizzaController::class, 'allNotFavorite']);
    // Index Favorite Pizzas
    Route::get('/favorites', [FavoriteController::class, 'index']);
    // All Favorite Pizzas
    Route::get('/api/favorites', [FavoriteController::class, 'getFavoritePizza']);
    // Delete Favorite Pizza
    Route::delete('/api/favorites/{favorite}', [FavoriteController::class, 'destroy']);
    // Store Favorite Pizza
    Route::post('/api/storeFavoritePizza', [FavoriteController::class, 'store']);

    // Store New Review
    Route::post('/api/addReview', [ReviewController::class, 'store']);

    // Edit Settings Form
    Route::get('/settings', [UserController::class, 'settings']);
    // Update Private Information
    Route::put('/users/private', [UserController::class, 'updatePrivate']);
    // Update Password
    Route::put('/users/password', [UserController::class, 'updatePassword']);
});

// User Authentication
Route::middleware('guest')->group(function () {
    Route::get('/registration', [UserController::class, 'registration']);
    Route::post('/register', [UserController::class, 'store']);
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/authenticate', [UserController::class, 'authenticate']);
    Route::get('/admin/login', [UserController::class, 'loginAdmin']);
    Route::post('/authenticateAdmin', [UserController::class, 'authenticateAdmin']);
});

// All Pizzas
Route::get('/daily_menu', [PizzaController::class, 'index']);
// Index Reviews Page
Route::get('/reviews', [ReviewController::class, 'index']);
// Get All Reviews
Route::get('/api/reviews', [ReviewController::class, 'getApi']);

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Authorization Middleware Admin, Manager
Route::middleware([AdminMiddleware::class.':admin,manager'])->group(function () {
    // Admin Users Index
    Route::get('/admin/users', [UserController::class, 'index']);
    // Admin Destroy User
    Route::delete('/admin/delete/user/{user}', [UserController::class, 'destroy']);
    // Admin Create Add User
    Route::get('/admin/add/user', [UserController::class, 'addUser']);
    // Admin Store User
    Route::post('admin/store/user', [UserController::class, 'storeUser']);
});
// Authorization Middleware Admin, Manager, Employee
Route::middleware([AdminMiddleware::class.':admin,manager,employee'])->group(function () {
    // Admin Pizza Index
    Route::get('/admin/pizzas', [PizzaController::class, 'indexAdmin']);
    // Admin Destroy Pizza
    Route::delete('/admin/delete/pizza/{pizza}', [PizzaController::class, 'destroy']);
    // Admin Store Pizza
    Route::post('/admin/add/pizza', [PizzaController::class, 'store']);
    // Admin Edit Pizza
    Route::get('/admin/edit/pizza/{pizza}', [PizzaController::class, 'edit']);
    // Admin Update Pizza
    Route::put('/admin/update/pizza/{pizza}', [PizzaController::class, 'update']);
});



