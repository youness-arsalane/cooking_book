<?php

namespace App\Http\Controllers\Admin;

use App\Recipe;
use App\Ingredient;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;

class IngredientController extends Controller
{
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

    public function edit(Ingredient $ingredient)
    {
        return view('admin.ingredients.form', compact('ingredient'));
    }

    public function store()
    {
        request()->validate(array(
            'title' => 'required',
        ));

        $ingredient = new Ingredient();
        $ingredient->title = request('title');
        $ingredient->save();

        return redirect('admin/ingredients/' . $ingredient->id . '/edit');
    }

    public function update(Ingredient $ingredient)
    {
        request()->validate([
            'title' => 'required',
        ]);

        $ingredient->title = request('title');
        $ingredient->save();

        return redirect('admin/ingredients/' . $ingredient->id . '/edit');
    }

    public function saveImage(Ingredient $ingredient)
    {
        if (!empty(request()->image)) {
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = new Filesystem();
            $file->cleanDirectory('images/ingredients/' . $ingredient->id);

            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/ingredients') . '/' . $ingredient->id, $imageName);

            $ingredient->image_name = $imageName;
            $ingredient->save();
        }

        return redirect('admin/ingredients/' . $ingredient->id . '/edit');
    }

    public function deleteImage(Ingredient $ingredient)
    {
        $ingredient->image_name = '';
        $ingredient->save();

        return redirect('admin/ingredients/' . $ingredient->id . '/edit');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect('admin/ingredients');
    }
}
