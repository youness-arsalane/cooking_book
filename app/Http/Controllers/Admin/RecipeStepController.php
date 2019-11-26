<?php

namespace App\Http\Controllers\Admin;

use App\Recipe;
use App\RecipeStep;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeStepCollection;

class RecipeStepController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getJSON(Request $request, Recipe $recipe)
    {
        return new RecipeStepCollection($recipe->steps()->get());
    }

    public function add(Request $request, Recipe $recipe, $quantity = 1)
    {
        for ($i = 0; $i < $quantity; $i++) {
            $recipeStep = new RecipeStep();
            $recipeStep->recipe_id = $recipe->id;
            $recipeStep->description = '';

            $recipeStep->save();
        }
    }

    public function saveAll(Request $request, Recipe $recipe)
    {
        foreach ($request->get('steps') as $stepId => $stepData) {
            $step = RecipeStep::find($stepId);

            if (!empty($stepData['description'])) {
                $step->recipe_id = $recipe->id;
                $step->description = $stepData['description'];

                $step->save();
            } else {
                $step->delete();
            }
        }

        return redirect('admin/recipes/' . $recipe->id . '/edit');
    }

    public function destroy(RecipeStep $recipeStep)
    {
        $recipeStep->delete();
    }
}
