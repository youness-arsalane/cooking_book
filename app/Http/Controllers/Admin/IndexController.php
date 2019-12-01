<?php

namespace App\Http\Controllers\Admin;

use App\Recipe;
use App\NewsItem;
use App\Ingredient;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $recipeCount = Recipe::all()->count();
        $ingredientCount = Ingredient::all()->count();
        $newsItemCount = NewsItem::all()->count();
        return view('admin.index', compact('recipeCount', 'ingredientCount', 'newsItemCount'));
    }
}
