<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[UserController::class, 'welcome'])->name('welcome');

Route::get('/register', [UserController::class, 'bukaregister'])->name('bukaregister');
Route::post('/register',[UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'bukalogin'])->name('bukalogin');
Route::post('/login',[UserController::class, 'login'])->name('login');

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin',[UserController::class, 'admin'])->name('admin')->middleware('isAdmin');
    Route::get('/updateuser/{user}',[UserController::class, 'bukaupdateuser'])->middleware('isAdmin')->name('bukaupdateuser');
    Route::patch('/updateuser/{user}',[UserController::class, 'updateuser'])->middleware('isAdmin')->name('updateuser');
    Route::get('/deleteuser/{user}',[UserController::class, 'deleteuser'])->middleware('isAdmin')->name('deleteuser');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/logout',[UserController::class, 'logout'])->name('logout');

    Route::get('/carlist',[CarController::class, 'carlist'])->name('carlist');
    Route::get('/registercar/',[CarController::class, 'bukaregisterCar'])->name('bukaregisterCar');
    Route::post('/registercar/',[CarController::class, 'registerCar'])->name('registerCar');
    Route::get('/rentcar/{car}',[CarController::class, 'bukarentCar'])->name('bukarentCar');
    Route::patch('/rentcar/{car}',[CarController::class, 'rentCar'])->name('rentcar');

    Route::get('/profile/{user}',[UserController::class, 'bukaprofile'])->name('bukaprofile');
});


