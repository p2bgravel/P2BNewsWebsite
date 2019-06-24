<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//base route : api/v1/
//controller at : App\Http\Controllers\Api\V1
//route name: api.v1.*
Route::prefix('v1')->namespace('Api\V1')->name('api.v1.')->group(function () {
    // auth
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
    });
    //admin
    Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['jwt.auth','role:admin|mod'])->group(function () {
        Route::get('articles', 'ArticleController@index');
        Route::post('articles', 'ArticleController@store');
        Route::get('articles/{id}', 'ArticleController@show');
        Route::put('articles/{id}', 'ArticleController@update');
        Route::delete('articles/{id}', 'ArticleController@destroy');

        Route::get('categories', 'CategoryController@index');
    });
});