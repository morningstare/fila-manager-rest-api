<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register',[\App\Http\Controllers\UserController::class,'register']);

Route::post('login',[\App\Http\Controllers\UserController::class,'login']);

//Route::middleware('auth:api')->group(function (){
//   Route::post('token',[\App\Http\Controllers\UserController::class,'refreshToken']);
//});





Route::middleware(\App\Http\Middleware\Token::class)->group(function (){
    Route::post('posts',[\App\Http\Controllers\PostController::class,'store']);

    Route::delete('posts/{id}',[\App\Http\Controllers\PostController::class,'destroy']);

    Route::get('posts',[\App\Http\Controllers\PostController::class,'index']);

    Route::put('posts/{id}',[\App\Http\Controllers\PostController::class,'update']);

    Route::post('photos', [\App\Http\Controllers\PhotoController::class,'store']);

    Route::get('photos', [\App\Http\Controllers\PhotoController::class,'index']);
});

