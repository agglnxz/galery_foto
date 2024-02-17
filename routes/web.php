<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;

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

Route::middleware(['guest'])->group(function () {
  // login
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');


  // register
    Route::get('/register',[RegisterController::class,'register'])->name('register');
    Route::post('/register-proses',[RegisterController::class,'register_proses'])->name('register-proses');

});

// photo
Route::get('/photo.index',[PhotoController::class,'index'])->name('photo.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
  // profile
    Route::get('/profile.index',[ProfileController::class,'index'])->name('profile.index');
    Route::get('/profile.edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('/profile.update',[ProfileController::class,'update'])->name('profile.update');

});
