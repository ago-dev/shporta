<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FoodServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsCustomerMiddleware;
use App\Http\Middleware\IsEmployeeMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* Authentication routes */
Route::get('/', [LoginController::class, 'authenticated'])->middleware('auth');

Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->middleware(IsEmployeeMiddleware::class)->name('home');
Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');
Auth::routes();

/* Employee routes */
Route::put('/employees/{id}', [EmployeeController::class, 'update'])
    ->middleware(IsAdminMiddleware::class)
    ->name('employee-update')->middleware('auth');
Route::post('/employees/{id}', [EmployeeController::class, 'destroy'])
    ->middleware(IsAdminMiddleware::class)
    ->name('employee-delete')->middleware('auth');
Route::post('/employees', [EmployeeController::class, 'store'])
    ->middleware(IsAdminMiddleware::class)
    ->name('employee-create')->middleware('auth');
Route::get('/employees', [EmployeeController::class, 'index'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name("employees")->middleware('auth');

/* Authenticated user profile routes */
Route::post('/profile', [ImageController::class, 'store'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('image-upload')->middleware('auth');

/* Orders routes */
Route::get('/orders', [OrderController::class, 'index'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('orders')->middleware('auth');
Route::post('/orders/{id}', [OrderController::class, 'destroy'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('order-delete')->middleware('auth');
Route::put('/orders/{id}', [OrderController::class, 'update'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('order-update')->middleware('auth');

/* Restaurants routes */
Route::get('/food-services', [FoodServiceController::class, 'index'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('food-services')->middleware('auth');
Route::post('/food-services/{id}', [FoodServiceController::class, 'destroy'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('food-service-delete')->middleware('auth');
Route::post('/food-services', [FoodServiceController::class, 'store'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('food-service-create')->middleware('auth');
Route::put('/food-services/{id}', [FoodServiceController::class, 'update'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('food-service-update')->middleware('auth');

/* Menu routes */
Route::get('/menus', [MenuController::class, 'index'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('menus')->middleware('auth');
Route::post('/menus', [MenuController::class, 'store'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('menu-create')->middleware('auth');
Route::post('/menus/{id}', [MenuController::class, 'destroy'])
    ->middleware(IsEmployeeMiddleware::class)
    ->name('menu-delete')->middleware('auth');

/* Customer routes */
Route::get('/welcome', [WelcomeController::class, 'index'])
    ->middleware(IsCustomerMiddleware::class)
    ->name('welcome');
Route::get('/food-service/{id}', [FoodServiceController::class, 'show'])
    ->middleware(IsCustomerMiddleware::class)
    ->name('food-service.show');

Route::get('cart', [CartController::class, 'cartList'])
    ->middleware(IsCustomerMiddleware::class)
    ->name('cart');
Route::post('cart', [CartController::class, 'addToCart'])
    ->middleware(IsCustomerMiddleware::class)
    ->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])
    ->middleware(IsCustomerMiddleware::class)
    ->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])
    ->middleware(IsCustomerMiddleware::class)
    ->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])
    ->middleware(IsCustomerMiddleware::class)
    ->name('cart.clear');

Route::post('order', [OrderController::class, 'store'])
    ->middleware(IsCustomerMiddleware::class)
    ->name('purchase.order');

/* Middleware */
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
