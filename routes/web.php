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


Route::get('/', 'VotacaoController@index')->name('index');
Route::get('/governador', 'VotacaoController@governador')->name('governador');
Route::get('/prefeito', 'VotacaoController@prefeito')->name('prefeito');
Route::get('/fim', 'VotacaoController@fim')->name('fim');
Route::post('consultar_candidato/{num_candidato}', 'VotacaoController@consultar_candidato')->name('consultar_candidato');
Route::post('confirmar_voto', 'VotacaoController@confirmar_voto')->name('confirmar_voto');




