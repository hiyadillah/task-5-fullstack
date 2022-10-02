<?php

use App\Http\Controllers\Api\V1\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test',[HomeController::class,'test']);

// API RESOURCE
Route::group(['prefix'=>'v1'], function(){
    Route::apiResource('article',ArticleController::class)->middleware('auth:api');
    Route::apiResource('user',UserController::class)->middleware('auth:api');
});

// API AUTHENTICATION
Route::post('/login',[LoginController::class, 'show']);