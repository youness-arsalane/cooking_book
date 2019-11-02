<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //
    public function recipes()
    {
        return array(1);
//        $this->belongsToMany(Recipe::class);
    }
}
