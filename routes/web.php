<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('/tutor', 'TutorController');

Route::resource('/pet', 'PetController');

Route::resource('/creche', 'CrecheController');

Route::resource('/hospedagem', 'HospedagemController');

Auth::routes();

Route::get('/hospedagem/finalizar/{id}', 'HospedagemController@finalizar');

Route::get('/creche/finalizar/{id}', 'CrecheController@finalizar');



Route::get('/home', 'HomeController@index')->name('home');
