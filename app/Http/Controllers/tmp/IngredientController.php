<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ingredients = Ingredient::all();
        return view('admin.ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        $ingredient = new Ingredient();
        return view('admin.ingredients.form', compact('ingredient'));
    }

    public function store(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient->title = request('title');
        $ingredient->save();

        return redirect('admin/ingredients/' . $ingredient->id . '/edit');
    }

    public function show(Ingredient $ingredient)
    {
    }

    public function edit(Ingredient $ingredient)
    {
        return view('admin.ingredients.form', compact('ingredient'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->title = request('title');
        $ingredient->save();

        return redirect('admin/ingredients/' . $ingredient->id . '/edit');
    }

    public function destroy(Ingredient $ingredient)
    {
        try {
            $ingredient->delete();

            return redirect('admin/ingredients');
        } catch (\Exception $e) {
        }
    }
}
