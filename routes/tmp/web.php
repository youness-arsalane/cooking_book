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

//Route::get('recipes', 'RecipeController@index');
//Route::get('recipes/create', 'RecipeController@create');
//Route::get('recipes/{recipe}', 'RecipeController@edit');
//Route::get('recipes/{recipe}/edit', 'RecipeController@edit');
//Route::post('recipes/store', 'RecipeController@store');
//Route::post('recipes/{recipe}', 'RecipeController@update');

Route::get('admin/ingredients', 'IngredientController@index');
Route::get('admin/ingredients/create', 'IngredientController@create');
Route::get('admin/ingredients/{ingredient}/edit', 'IngredientController@edit');

Route::post('admin/ingredients/store', 'IngredientController@store');
Route::post('admin/ingredients/{ingredient}/update', 'IngredientController@update');
Route::get('admin/ingredients/{ingredient}/destroy', 'IngredientController@destroy');
//Route::post('ingredients/{ingredient}/destroy', 'IngredientController@destroy');

Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@login');
