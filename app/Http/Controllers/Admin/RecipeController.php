<?php

namespace App\Http\Controllers\Admin;

use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required',
        ));

        $recipe = new Recipe();
        $recipe->title = $request->get('title');
        $recipe->description = $request->get('description');
        $recipe->save();

        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function edit(Recipe $recipe)
    {
        return view('admin.recipes.form', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $this->validate($request, array(
            'title' => 'required',
        ));

        $recipe->title = $request->get('title');
        $recipe->description = $request->get('description');
        $recipe->save();

        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function saveImage(Request $request, Recipe $recipe)
    {
        if (!empty(request()->image)) {
            $this->validate($request, array(
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ));

            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/recipes') . '/' . $recipe->id, $imageName);

            $recipe->image_name = $imageName;
            $recipe->save();
        }

        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function deleteImage(Request $request, Recipe $recipe)
    {
        $recipe->image_name = '';
        $recipe->save();

        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect('admin/recipes');
    }
}
