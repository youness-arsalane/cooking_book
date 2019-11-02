<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();

        return view('ingredients/index', compact('ingredients'));
    }

    public function add()
    {
        return view('ingredients/form');
    }

    public function details($id)
    {
        return view('ingredients/form', compact('id'));
    }

    public function save()
    {

    }

    public function delete()
    {

    }
}
