<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeStep extends Model
{
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
