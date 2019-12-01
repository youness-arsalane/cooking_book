<?php

namespace App\Http\Controllers\Admin;

use App\Recipe;
use App\NewsItem;
use App\Ingredient;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('admin.recipes.index', compact('recipes'));
    }

    public function create()
    {
        $recipe = new Recipe();
        return view('admin.recipes.form', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        $ingredients = Ingredient::all();
        foreach ($ingredients as $key => $ingredient) {
            foreach ($recipe->ingredients()->get() as $recipeIngredient) {
                if ($ingredient->id === $recipeIngredient->id) {
                    unset($ingredients[$key]);
                    break;
                }
            }
        }

        $newsItems = NewsItem::all();
        foreach ($newsItems as $key => $newsItem) {
            foreach ($recipe->newsItems()->get() as $recipeNewsItem) {
                if ($newsItem->id === $recipeNewsItem->id) {
                    unset($newsItems[$key]);
                    break;
                }
            }
        }

        return view('admin.recipes.form', compact('recipe', 'ingredients', 'newsItems'));
    }

    public function store()
    {
        request()->validate(array(
            'title' => 'required',
        ));

        $recipe = new Recipe();
        $recipe->title = request('title');
        $recipe->description = request('description');
        $recipe->save();

        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function update(Recipe $recipe)
    {
        request()->validate([
            'title' => 'required',
        ]);

        $recipe->title = request('title');
        $recipe->description = request('description');
        $recipe->save();

        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function saveImage(Recipe $recipe)
    {
        if (!empty(request()->image)) {
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = new Filesystem();
            $file->cleanDirectory('images/recipes/' . $recipe->id);

            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/recipes') . '/' . $recipe->id, $imageName);

            $recipe->image_name = $imageName;
            $recipe->save();
        }

        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function deleteImage(Recipe $recipe)
    {
        $recipe->image_name = '';
        $recipe->save();

        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function addIngredient(Recipe $recipe)
    {
        $recipe->ingredients()->attach(request('ingredient_id'));
        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function deleteIngredient(Recipe $recipe, Ingredient $ingredient)
    {
        $recipe->ingredients()->detach($ingredient->id);
        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function addNewsItem(Recipe $recipe)
    {
        $recipe->newsItems()->attach(request('news_item_id'));
        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function deleteNewsItem(Recipe $recipe, NewsItem $newsItem)
    {
        $recipe->newsItems()->detach($newsItem->id);
        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect('admin/recipes');
    }
}
