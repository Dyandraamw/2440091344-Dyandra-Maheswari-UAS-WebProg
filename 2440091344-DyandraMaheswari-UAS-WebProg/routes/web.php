<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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


    Route::get('/', [AuthController::class, 'index']);

    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginAuth']);

    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'storeRegister']);

    Route::get('/logout', [AuthController::class, 'logout'])->middleware('security');
    Route::get('/logoutSuccess', [AuthController::class, 'logoutSuccess']);

    Route::get('/home', [HomeController::class, 'home'])->middleware('security');
    Route::get('/itemDetail/{id}', [HomeController::class, 'showDetail'])->middleware('security');

    Route::post('/addCart', [OrderController::class, 'addCart'])->middleware('security');
    Route::get('/cart', [OrderController::class, 'showCart'])->middleware('security');
    Route::get('/deleteCart/{id}', [OrderController::class, 'deleteCart'])->middleware('security');

    Route::post('/addOrder', [OrderController::class, 'addOrder'])->middleware('security');
    Route::get('/success', [OrderController::class, 'success'])->middleware('security');

    Route::post('/editProfile', [AuthController::class, 'editProfile'])->middleware('security');
    Route::get('/profile', [AuthController::class, 'profile'])->middleware('security');
    Route::get('/saved', [AuthController::class, 'saved'])->middleware('security');

    Route::get('/showAcc', [AuthController::class, 'showAcc'])->middleware('adminsecurity');
    Route::get('/deleteAcc/{id}', [AuthController::class, 'deleteAcc'])->middleware('adminsecurity');

    Route::post('/editRole', [AuthController::class, 'editRole'])->middleware('adminsecurity');
    Route::get('/showRole/{id}', [AuthController::class, 'showRole'])->middleware('adminsecurity');

    Route::get('/switchLang/{locale}', [AuthController::class, 'switchLang']);

