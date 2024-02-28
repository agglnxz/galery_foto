<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

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
// galery
Route::get('/photo.index',[PhotoController::class,'index'])->name('photo.index');
// detail galery
Route::get('/detail-photo/{id}',[PhotoController::class,'show'])->name('detail-photo');

Route::middleware(['guest'])->group(function () {
  // login
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');


  // register
    Route::get('/register',[RegisterController::class,'register'])->name('register');
    Route::post('/register-proses',[RegisterController::class,'register_proses'])->name('register-proses');

});


Route::middleware(['auth'])->group(function () {
    // logout
    Route::post('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/logout',function () {
        return redirect()->route('login')->with(['danger','anda harus login!!!']);
    });

  // profile
    Route::get('/profile.index',[ProfileController::class,'index'])->name('profile.index');
    Route::put('edit_profil',[ProfileController::class,'update'])->name('edit_profil');

  // tambah foto
    Route::post('/add_photo',[PhotoController::class,'store'])->name('add_photo');

    // like
    Route::post('/like/{id}',[LikeController::class,'store'])->name('like');

    // comments
    Route::post('/comments/{id}',[CommentController::class,'store'])->name('comments');
    route::put('/edit_comments/{id}',[CommentController::class,'update'])->name('edit_comments');
    Route::delete('/delete_comments/{id}',[CommentController::class,'destroy'])->name('delete_comments');




});
