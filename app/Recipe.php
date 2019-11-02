<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    public function ingredients()
    {
        return array(1);
//        $this->belongsToMany(Ingredient::class);
    }
}
