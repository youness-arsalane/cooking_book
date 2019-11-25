<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.form');
    }

    public function store(Request $request)
    {
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.form', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {

    }

    public function update(Request $request, Recipe $recipe)
    {

    }

    public function destroy(Recipe $recipe)
    {

    }
}
