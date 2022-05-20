<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;


Route::get('/series', 'App\Http\Controllers\SeriesController@index')
    ->name('listar_series');

Route::get('/series/create', 'App\Http\Controllers\SeriesController@create')
    ->name('form_criar_series');

Route::post('/series/create','App\Http\Controllers\SeriesController@store');

Route::delete('/series/{id}','App\Http\Controllers\SeriesController@destroy');

Route:: post('/series/{id}/editaNome', 'SeriesController@editaNome');

Route::get('/series/{serieId}/temporadas', 'App\Http\Controllers\TemporadasController@index'); 

Route::get('/temporadas/{temporada}/episodios', 'App\Http\Controllers\EpisodiosController@index'); 

