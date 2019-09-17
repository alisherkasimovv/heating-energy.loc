<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = [
        'related_post_id',
        'related_product_id',
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

    public function registerPostRecommendation($id)
    {
        if ($id != null)
            $this->related_post_id = $id;
    }

    public function registerProductRecommendation($id)
    {
        if ($id != null)
            $this->related_product_id = $id;
    }
}
