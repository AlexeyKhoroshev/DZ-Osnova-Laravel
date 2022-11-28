<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');

});

//--------------------------категории товаров---------------------------------------

Route::get ('/categories/create',        'CategoryController@create');                   //показать форму добавления категории
Route::get ('/categories',               'CategoryController@index');                    //показать все категории
Route::get ('/categories/{id}',          'CategoryController@show');                     //показать одну категорию с номером id
Route::get ('/categories/{id}/edit',     'CategoryController@edit');                     //показать страницу редактирования категорий
Route::get ('/categories/{id}/products', 'CategoryController@showProducts');             //показать список товаров в категории с номером id

Route::put ('/categories/{id}',          'CategoryController@update');                   //внести в бд изменения категории
Route::post('/categories',               'CategoryController@store');                    //добавить категорию

//-------------------------------товары--------------------------------------------

Route::get ('/products/create',          'ProductController@create');                    //показать форму добавления категории
Route::get ('/products',                 'ProductController@index');                     //показать все товары
Route::get ('/products/{id}/edit',       'ProductController@edit');                      //показать страницу редактирования товаров
Route::get ('/products/{id}',            'ProductController@show');                      //показать товар с номером id

Route::post  ('/products',               'ProductController@store');
Route::put   ('/products/{id}',          'ProductController@update');                    //внести в бд изменения инфы о товарех
Route::delete('/products/{id}',          'ProductController@destroy');

