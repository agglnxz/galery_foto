<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleryFotoController;
use App\Http\Controllers\WelcomeController;


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

// Route::get('/', function () {
//    return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::get('/galery.index',[GaleryFotoController::class,'index'])->name('galery.index');

route::get('/dashboard',[WelcomeController::class,'show'])->name('dashboard');
route::get('/student',[WelcomeController::class,'student'])->name('student');
