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

Route::group([ 'prefix' => 'auth'], function (){
    Route::group(['middleware' => ['guest:api']], function () {
        Route::post('login', 'Api\AuthController@login');
        Route::post('signup', 'Api\AuthController@signup');
    });
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('getuser', 'Api\AuthController@getUser');
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('notes/{day}', 'NotesController@index');
    Route::post('notes', 'NotesController@store');
    Route::post('notes/{id}', 'NotesController@edit');
    Route::post('notes/{id}/update', 'NotesController@update');
    Route::post('notes/{id}/remove', 'NotesController@destroy');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('group', 'GroupController@store');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('group/member', 'GroupUserController@store');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('group/admin', 'GroupAdminController@store');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('block', 'BlockController@store');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('message', 'MessageController@index');
    Route::post('message/store', 'MessageController@store');
    Route::post('message/{id}', 'MessageController@show');
});
