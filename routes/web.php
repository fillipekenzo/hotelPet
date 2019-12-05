<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/tutor', 'TutorController');

Route::resource('/pet', 'PetController');

Route::resource('/creche', 'CrecheController');

Route::resource('/hospedagem', 'HospedagemController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
