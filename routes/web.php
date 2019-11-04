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
Route::get('recipes/{recipe}', 'RecipeController@show');
Route::get('recipes/{recipe}/edit', 'RecipeController@edit');
Route::post('recipes/{recipe}', 'RecipeController@update');

Route::get('ingredients', 'IngredientController@index');
Route::get('ingredients/{ingredient}', 'IngredientController@show');
Route::get('ingredients/{ingredient}/edit', 'IngredientController@edit');
Route::post('ingredients/{ingredient}', 'IngredientController@update');
