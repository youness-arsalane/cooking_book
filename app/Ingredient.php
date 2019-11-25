<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';

    protected $fillable = ['title'];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
