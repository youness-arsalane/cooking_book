<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipeStepCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
//        return array(
//            'id' => $this->id,
//            'recipe_id' => $this->recipe_id,
//            'description' => $this->description,
//            'position' => $this->position
//        );
    }
}
