<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

//dashboard
Route::get('/home', 'HomeController@index')
    -> name('home');
    Route::get('/','TypologyController@index')
        -> name('welcome');
    Route::get('/show/typology/{id}', 'TypologyController@show')
        -> name('typ-show');
    //index
    //Route::get('/index/menu/', 'UserMenuController@index')
        //->name('user-menu-index');
    //show
    Route::get('/show/menu/{id}', 'UserMenuController@show')
        ->name('user-menu-show');




//RISTORANTE
//dishes
Route::get('/dishes', 'DishController@index')   
    -> name('dish-index');
    //dishes create-store
    Route::get('/create/dish', 'DishController@create')
        -> name('dish-create');
    Route::post('/store/dish', 'DishController@store')
        -> name('dish-store');
    //dishes edit-update
    Route::get('/edit/dish/{id}', 'DishController@edit')
        -> name('dish-edit');
    Route::post('/update/dish/{id}', 'DishController@update')
        -> name('dish-update');
    //dishes delete
    Route::get('/delete/dish/{id}', 'DishController@delete')
        -> name('dish-delete');

//orders
Route::get('/orders', 'OrderController@index') 
    -> name('order-index');
    //orders-show
    Route::get('/show/order/{id}', 'OrderController@show')
    -> name('order-show');
    //orders-stats
    Route::get('/stats', 'OrderController@stats') 
    -> name('order-stats');
    


