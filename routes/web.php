<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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
Auth::routes();
Route::get('/home', [HomeController::class,'index']);
Route::get('/', 'App\Http\Controllers\PostController@authUser');
Route::get('/', 'App\Http\Controllers\PostController@showAll');

Route::get('/post/show/{id}', 'App\Http\Controllers\PostController@show');

Route::get('/post/create', function(){
    return view('create_post');
});

Route::get('/post/positive_inc/{id}', 'App\Http\Controllers\PostController@increasePositive');
Route::get('/post/negative_inc/{id}', 'App\Http\Controllers\PostController@increaseNegative');

Route::post('/post/create', 'App\Http\Controllers\PostController@create');