<?php

namespace App;

use URL;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function steps()
    {
        return $this->hasMany(RecipeStep::class)->orderBy('position');
    }

    public function imageURL()
    {
        return (!empty($this->image_name)) ? URL::to('/images/recipes') . '/' . $this->id . '/' . $this->image_name : '';
    }
}
