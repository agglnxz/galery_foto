<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleryFotoController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/',[WelcomeController::class,'index'])->name('dashboard');


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[RegisterController::class,'register'])->name('register');
Route::post('/register_proses',[RegisterController::class,'register_proses'])->name('register_proses');



Route::get('/galery.index',[GaleryFotoController::class,'index'])->name('galery.index');
