<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();

        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.form');
    }

    public function store(Request $request)
    {
    }

    public function show(Ingredient $ingredient)
    {
        return view('ingredients.form', compact('ingredient'));
    }

    public function edit(Ingredient $ingredient)
    {

    }

    public function update(Request $request, Ingredient $ingredient)
    {

    }

    public function destroy(Ingredient $ingredient)
    {

    }
}
