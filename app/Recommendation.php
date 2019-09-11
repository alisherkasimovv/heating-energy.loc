<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = [
        'source_id',
        'recommendation_id',
        'recommendation_type'
    ];

    /*
     * Relations
     */
    public function recommendations()
    {
        return $this->morphTo();
    }

    public function registerRecommendation($id)
    {
        if ($id != null)
            $this->source_id = $id;
    }
}
