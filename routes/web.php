<?php

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

Route::get('/index',[\App\Http\Controllers\PostController::class,'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    return view('create');
});

Route::middleware(['jwt-auth'])->group(function (){
    Route::post('/post/{category}',[\App\Http\Controllers\PostController::class,'store']);
//Route::delete('/delete/{id}',[\App\Http\Controllers\PostController::class,'destroy']);
    Route::delete('/delete/{category}/{id}',[\App\Http\Controllers\PostController::class,'destroy']);
    Route::get('/edit/{id}',[\App\Http\Controllers\PostController::class,'edit']);

    Route::delete('/deleteimage/{id}',[\App\Http\Controllers\PostController::class,'deleteimage']);
    Route::delete('/deletecover/{id}',[\App\Http\Controllers\PostController::class,'deletecover']);

    Route::put('/update/{id}',[\App\Http\Controllers\PostController::class,'update']);
});

