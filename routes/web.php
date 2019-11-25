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

Route::get('admin/login', 'Auth\LoginController@index');
Route::post('admin/login', 'Auth\LoginController@login');
Route::get('admin/logout', 'Auth\LoginController@logout');

Route::get('admin', 'Admin\IndexController@index');

Route::get('admin/recipes', 'Admin\RecipeController@index');
Route::get('admin/recipes/create', 'Admin\RecipeController@create');
Route::get('admin/recipes/{recipe}/edit', 'Admin\RecipeController@edit');
Route::post('admin/recipes/store', 'Admin\RecipeController@store');
Route::post('admin/recipes/{recipe}/update', 'Admin\RecipeController@update');
Route::post('admin/recipes/{recipe}/saveImage', 'Admin\RecipeController@saveImage');
Route::get('admin/recipes/{recipe}/deleteImage', 'Admin\RecipeController@deleteImage');
Route::get('admin/recipes/{recipe}/destroy', 'Admin\RecipeController@destroy');
