<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'PostsController@index');

Route::get('/auth', function() {

    if(Auth::attempt(['email'=>'enzosarmento91@gmail.com', 'password'=>123456])) {

        return 'Olá';

    } else {

        return 'Falhou';
    };

});

Route::get('/auth/logout', function() {
    Auth::logout();
});

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function() {

    Route::group(['prefix'=>'posts'], function() {
        Route::get('', ['as'=> 'admin.posts.index', 'uses'=>'PostsAdminController@index']);
        Route::get('create', ['as'=> 'admin.posts.create', 'uses'=>'PostsAdminController@create']);
        Route::post('store', ['as'=> 'admin.posts.store', 'uses'=>'PostsAdminController@store']);
        Route::get('edit/{id}', ['as'=> 'admin.posts.edit', 'uses'=>'PostsAdminController@edit']);
        Route::put('update/{id}', ['as'=> 'admin.posts.update', 'uses'=>'PostsAdminController@update']);
        Route::get('destroy/{id}', ['as'=> 'admin.posts.destroy', 'uses'=>'PostsAdminController@destroy']);
    });

});




