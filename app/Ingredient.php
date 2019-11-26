<?php

namespace App;

use URL;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';

    protected $fillable = ['title'];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function imageURL()
    {
        return (!empty($this->image_name)) ? URL::to('images/ingredients') . '/' . $this->id . '/' . $this->image_name : '';
    }

    public function save(array $options = [])
    {
        $this->updated_at = (new \DateTime())->format('Y-m-d H:i:s');
        return parent::save($options);
    }
}
