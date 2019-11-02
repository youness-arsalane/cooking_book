<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipes/index', compact('recipes'));
    }

    public function add()
    {
        return view('recipes/form');
    }

    public function details($id)
    {
        return view('recipes/form', compact('id'));
    }

    public function save()
    {

    }

    public function delete()
    {

    }
}
