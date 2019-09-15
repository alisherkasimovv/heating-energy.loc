<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use Sluggable;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
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
