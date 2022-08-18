<?php

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

Route::get('/', 'Authcontroller@index')->name('index');

Route::post('/login', 'AuthController@login')->name('login');

Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/atendimentos', 'Atendimentos@atendimentos')->name('atendimentos');

});

Route::get('/logout', 'AuthController@logout')->name('logout');