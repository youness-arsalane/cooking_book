<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Route::get('recipes', 'RecipeController@index');
Route::get('recipes/add', 'RecipeController@add');
Route::post('recipes/save', 'RecipeController@save');
Route::get('recipes/details/{id}', 'RecipeController@details');

Route::get('ingredients', 'IngredientController@index');
Route::get('ingredients/add', 'IngredientController@add');
Route::post('ingredients/save', 'IngredientController@save');
Route::get('ingredients/details/{id}', 'IngredientController@details');
