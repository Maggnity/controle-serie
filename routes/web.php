<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;


Route::get('/series', 'App\Http\Controllers\SeriesController@index')
    ->name('listar_series');

Route::get('/series/create', 'App\Http\Controllers\SeriesController@create')
    ->name('form_criar_series')
    ->middleware('autenticador');

Route::post('/series/create','App\Http\Controllers\SeriesController@store')
    ->middleware('autenticador');


Route::delete('/series/{id}','App\Http\Controllers\SeriesController@destroy')
->middleware('autenticador');


Route:: post('/series/{id}/editaNome', 'SeriesController@editaNome')
    ->middleware('autenticador');


Route::get('/series/{serieId}/temporadas', 'App\Http\Controllers\TemporadasController@index'); 

Route::get('/temporadas/{temporada}/episodios', 'App\Http\Controllers\EpisodiosController@index'); 

Route::post('/temporadas/{temporada}/episodios/assistir', 'App\Http\Controllers\EpisodiosController@assistir'); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/entrar', 'App\Http\Controllers\EntrarController@index');

Route::post('/entrar', 'App\Http\Controllers\EntrarController@entrar');

Route::get('/registrar', 'App\Http\Controllers\RegistroController@create');

Route::post('/registrar', 'App\Http\Controllers\RegistroController@store');

Route::get('/sair', function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/entrar');
});