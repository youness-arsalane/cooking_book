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

Route::get('news-items', 'NewsItemController@index');
Route::get('news-items/{newsItem}', 'NewsItemController@show');

Route::get('admin/login', 'Auth\LoginController@index');
Route::post('admin/login', 'Auth\LoginController@login');
Route::get('admin/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/my-profile', 'Admin\UserController@edit');
    Route::post('admin/my-profile/update', 'Admin\UserController@update');
    Route::post('admin/my-profile/updatePassword', 'Admin\UserController@updatePassword');

    Route::get('admin', 'Admin\IndexController@index');

    Route::get('admin/recipes', 'Admin\RecipeController@index');
    Route::get('admin/recipes/create', 'Admin\RecipeController@create');
    Route::get('admin/recipes/{recipe}/edit', 'Admin\RecipeController@edit');
    Route::post('admin/recipes/store', 'Admin\RecipeController@store');
    Route::post('admin/recipes/{recipe}/update', 'Admin\RecipeController@update');
    Route::post('admin/recipes/{recipe}/saveImage', 'Admin\RecipeController@saveImage');
    Route::get('admin/recipes/{recipe}/deleteImage', 'Admin\RecipeController@deleteImage');
    Route::post('admin/recipes/{recipe}/addIngredient', 'Admin\RecipeController@addIngredient');
    Route::get('admin/recipes/deleteIngredient/{recipe}/{ingredient}', 'Admin\RecipeController@deleteIngredient');
    Route::post('admin/recipes/{recipe}/addNewsItem', 'Admin\RecipeController@addNewsItem');
    Route::get('admin/recipes/deleteNewsItem/{recipe}/{newsItem}', 'Admin\RecipeController@deleteNewsItem');
    Route::get('admin/recipes/{recipe}/destroy', 'Admin\RecipeController@destroy');

    Route::post('admin/recipeSteps/getJSON/{recipe}', 'Admin\RecipeStepController@getJSON');
    Route::post('admin/recipeSteps/store/{recipe}/{quantity}', 'Admin\RecipeStepController@store');
    Route::post('admin/recipeSteps/{recipe}/updateAll', 'Admin\RecipeStepController@updateAll');
    Route::get('admin/recipeSteps/destroy/{recipeStep}', 'Admin\RecipeStepController@destroy');

    Route::get('admin/ingredients', 'Admin\IngredientController@index');
    Route::get('admin/ingredients/create', 'Admin\IngredientController@create');
    Route::get('admin/ingredients/{ingredient}/edit', 'Admin\IngredientController@edit');
    Route::post('admin/ingredients/store', 'Admin\IngredientController@store');
    Route::post('admin/ingredients/{ingredient}/update', 'Admin\IngredientController@update');
    Route::post('admin/ingredients/{ingredient}/saveImage', 'Admin\IngredientController@saveImage');
    Route::get('admin/ingredients/{ingredient}/deleteImage', 'Admin\IngredientController@deleteImage');
    Route::get('admin/ingredients/{ingredient}/destroy', 'Admin\IngredientController@destroy');

    Route::get('admin/news-items', 'Admin\NewsItemController@index');
    Route::get('admin/news-items/create', 'Admin\NewsItemController@create');
    Route::get('admin/news-items/{newsItem}/edit', 'Admin\NewsItemController@edit');
    Route::post('admin/news-items/store', 'Admin\NewsItemController@store');
    Route::post('admin/news-items/{newsItem}/update', 'Admin\NewsItemController@update');
    Route::post('admin/news-items/{newsItem}/saveImage', 'Admin\NewsItemController@saveImage');
    Route::get('admin/news-items/{newsItem}/deleteImage', 'Admin\NewsItemController@deleteImage');
    Route::post('admin/news-items/{newsItem}/addRecipe', 'Admin\NewsItemController@addRecipe');
    Route::get('admin/news-items/deleteRecipe/{newsItem}/{recipe}', 'Admin\NewsItemController@deleteRecipe');
    Route::get('admin/news-items/{newsItem}/destroy', 'Admin\NewsItemController@destroy');
});
