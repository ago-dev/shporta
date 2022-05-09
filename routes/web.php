<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FoodServiceController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* Authentication routes */
Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');
Auth::routes();

/* Employee routes */
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employee-update')->middleware('auth');
Route::post('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employee-delete')->middleware('auth');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employee-create')->middleware('auth');
Route::get('/employees', [EmployeeController::class, 'index'])->name("employees")->middleware('auth');

/* Authenticated user profile routes */
Route::post('/profile', [ImageController::class, 'store'])->name('image-upload')->middleware('auth');

/* Restaurants routes */
Route::get('/food-services', [FoodServiceController::class, 'index'])->name('food-services')->middleware('auth');
Route::post('/food-services/{id}', [FoodServiceController::class, 'destroy'])->name('food-service-delete')->middleware('auth');
Route::post('/food-services', [FoodServiceController::class, 'store'])->name('food-service-create')->middleware('auth');
Route::put('/food-services/{id}', [FoodServiceController::class, 'update'])->name('food-service-update')->middleware('auth');

/* Menu routes */
Route::get('/menus', [MenuController::class, 'index'])->name('menus')->middleware('auth');

/* Middleware */
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
