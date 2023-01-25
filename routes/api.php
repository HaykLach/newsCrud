<?php

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

Route::post('/login', ['as' => 'login', 'uses' => 'App\Http\Controllers\AuthController@login']);
Route::post('/register', ['as' => 'register', 'uses' => 'App\Http\Controllers\AuthController@register']);

Route::prefix('news')->group(function () {
    Route::post('/create', ['as' => 'news.create', 'uses' => 'App\Http\Controllers\NewsController@create']);
    Route::get('/{id}', ['as' => 'news.read', 'uses' => 'App\Http\Controllers\NewsController@read']);

    Route::middleware('auth:api')->group(function () {
       Route::put('/{id}/edit', ['as' => 'news.update', 'uses' => 'App\Http\Controllers\NewsController@edit']);
       Route::delete('/{id}/delete', ['as' => 'news,delete', 'uses' => 'App\Http\Controllers\NewsController@delete']);
    });
});

