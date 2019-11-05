<?php
Route::get('/', function () {
    return view('welcome');
});
Route::resource('/tutor', 'TutorController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
