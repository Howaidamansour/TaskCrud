<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('index');
Route::get('change/lang/{lang}', 'HomeController@changeLang')->name('change.lang');


Route::resource('categories', 'CategoryController');
Route::post('categories/{category}/toggle/status', 'CategoryController@toggleStatus')->name('categories.toggle.status');
Route::post('categories/multi-delete', 'CategoryController@multiDelete')->name('categories.multi-delete');





Route::resource('items', 'ItemController');
Route::post('items/{item}/toggle/status', 'ItemController@toggleStatus')->name('items.toggle.status');
Route::post('items/multi-delete', 'ItemController@multiDelete')->name('items.multi-delete');

