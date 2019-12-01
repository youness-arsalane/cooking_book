<?php

namespace App\Http\Controllers;

use App\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.form', compact('recipe'));
    }
}
