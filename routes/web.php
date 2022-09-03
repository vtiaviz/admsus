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
    Route::post('/atendimentos/consulta', 'Atendimentos@consulta')->name('/atendimentos/consulta');

    Route::get('/prenatal', 'PrenatalController@prenatal')->name('prenatal');
    Route::post('/prenatal/getList', 'PrenatalController@getList')->name('prenatal/getList');
    Route::get('/prenatal/getGestante/{id}', 'PrenatalController@getGestante')->name('/prenatal/getGestante');

    Route::get('/saude-mulher', 'MulheresController@saudeMulher')->name('saudeMulher');
    Route::get('/saude-crianca', 'CriancasController@saudeCrianca')->name('saudeCrianca');
    Route::get('/doencas-cronicas', 'CronicasController@doencasCronicas')->name('doencasCronicas');
    Route::get('/resultados', 'ResultadosController@resultados')->name('resultados');

});

Route::get('/logout', 'AuthController@logout')->name('logout');