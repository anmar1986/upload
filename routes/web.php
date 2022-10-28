<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'ContactController@admin');


Route::get('/', 'ContactController@index');

Route::get('/home', 'ContactController@getContact');
Route::post('/home', 'ContactController@saveContact');

Route::get('impressum', 'ContactController@impressum');

Route::post('uploadtoserver', 'ContactController@uploadtoserver');
Route::get('export-excel', 'ExcelExportController@export')->name('export_excel.excel');
