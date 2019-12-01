<?php

namespace App;

use URL;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function imageURL()
    {
        return (!empty($this->image_name))
            ? URL::to('images/newsItems') . '/' . $this->id . '/' . $this->image_name
            : URL::to('images/no-image.png');
    }

    public function save(array $options = [])
    {
        $this->updated_at = (new \DateTime())->format('Y-m-d H:i:s');
        return parent::save($options);
    }
}
