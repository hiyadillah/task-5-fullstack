<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/',[HomeController::class, 'index'])->name('landing');
Route::get('/detail/{id}',[HomeController::class, 'detail'])->name('detail');
Route::get('/profile',[HomeController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/profile/create',[HomeController::class, 'create'])->name('create')->middleware('auth');
Route::get('/profile/{id}/edit',[HomeController::class, 'profile'])->name('profile.edit')->middleware('auth');
Route::delete('/profile',[HomeController::class, 'profile'])->name('profile.delete')->middleware('auth');
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'show'])->name('signIn');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'show'])->name('signUp');

