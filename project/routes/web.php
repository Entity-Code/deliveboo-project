<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//dashboard
Route::get('/home', 'HomeController@index')
    -> name('home');

//dishes
Route::get('/dishes', 'DishController@index')   
    -> name('dish-index');
//dishes create-store
Route::get('/create/dish', 'DishController@create')
    -> name('dish-create');
Route::post('/store/dish', 'DishController@store')
    -> name('dish-store');

//orders
Route::get('/orders', 'OrderController@index') 
    -> name('order-index');
//orders-stats
Route::get('/stats', 'OrderController@stats') 
-> name('order-stats');



