<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckToken;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/test_authentication', 'UserController@test_authentication');
Route::post('/user/basic_authentication', 'UserController@basic_authentication');
Route::get('/user/bearer_authentication', 'UserController@bearer_authentication');
Route::post('/user/create', 'UserController@create');

Route::middleware([CheckToken::class])->group(function () {
    Route::post('/task/create', 'TaskController@create');
    Route::get('/task/read', 'TaskController@read');
    Route::delete('/task/delete', 'TaskController@delete');
    Route::delete('/user/delete', 'UserController@delete');
});