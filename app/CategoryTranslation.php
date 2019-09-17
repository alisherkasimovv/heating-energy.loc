<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use Sluggable;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'slug',
        'anchor'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
