<?php

use Illuminate\Support\Facades\Route;


Route::get('/series', 'App\Http\Controllers\SeriesController@index')
    ->name('listar_series');

Route::get('/series/create', 'App\Http\Controllers\SeriesController@create')
    ->name('form_criar_series');

Route::post('/series/create','App\Http\Controllers\SeriesController@store');

Route::delete('/series/{id}','App\Http\Controllers\SeriesController@destroy');

