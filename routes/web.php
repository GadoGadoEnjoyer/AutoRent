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
    Route::get('/admin',[UserController::class, 'admin'])->name('admin');
    Route::get('/updateuser/{user}',[UserController::class, 'bukaupdateuser'])->name('bukaupdateuser');
    Route::patch('/updateuser/{user}',[UserController::class, 'updateuser'])->name('updateuser');
    Route::patch('/unbanuser/{user}',[UserController::class, 'unbanuser'])->name('unbanuser');
    Route::get('/deleteuser/{user}',[UserController::class, 'deleteuser'])->name('deleteuser');

    Route::delete('/deletediskon/{diskon}',[UserController::class, 'deletediskon'])->name('deletediskon');
    Route::patch('/editdiskon/{diskon}',[UserController::class, 'editdiskon'])->name('editdiskon');
    Route::get('/buatdiskon',[UserController::class, 'bukabuatdiskon'])->name('bukabuatdiskon');
    Route::post('/buatdiskon',[UserController::class, 'buatdiskon'])->name('buatdiskon');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/logout',[UserController::class, 'logout'])->name('logout');

    Route::get('/carlist',[CarController::class, 'carlist'])->name('carlist');
    Route::get('/registercar/',[CarController::class, 'bukaregisterCar'])->name('bukaregisterCar');
    
    Route::get('/profile/{user}',[UserController::class, 'bukaprofile'])->name('bukaprofile');
    
    Route::patch('/returncar/{car}',[CarController::class, 'returncar'])->name('returncar');

});
Route::middleware(['auth','isBanned'])->group(function () {
    Route::post('/registercar/',[CarController::class, 'registerCar'])->name('registerCar');
    Route::get('/rentcar/{car}',[CarController::class, 'bukarentCar'])->name('bukarentCar');
    Route::patch('/rentcar/{car}',[CarController::class, 'rentCar'])->name('rentcar');
    Route::get('/cekdiskon/{car}',[UserController::class, 'cekdiskon'])->name('cekdiskon');
    Route::get('/denda/{car}',[CarController::class, 'bukadenda'])->name('bukadenda');
    Route::patch('/denda/{car}',[CarController::class, 'denda'])->name('denda');

});


