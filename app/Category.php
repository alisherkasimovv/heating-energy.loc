<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $fillable = [
        'parent_id'
    ];
    public $translatedAttributes = [
        'name',
        'anchor'
    ];

    /*
     * Relations
     */
    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_categories',
            'category_id',
            'product_id'
        );
    }

    /*
     * CRUD
     */

    public static function add($fields)
    {
        $category = new static;

        $category->parent_id = $fields['parent_id'];

        // Fill translatable data for english
        $category->translateOrNew('en')->name = $fields['name_en'];
        $category->translateOrNew('en')->anchor = $fields['anchor_en'];

        // Fill translatable data for russian
        $category->translateOrNew('ru')->name = $fields['name_ru'];
        $category->translateOrNew('ru')->anchor = $fields['anchor_ru'];

        $category->save();
        return $category;
    }

    public function edit($fields)
    {
        $this->parent_id = $fields['parent_id'];

        // Fill translatable data for english
        $this->translateOrNew('en')->name = $fields['name_en'];
        $this->translateOrNew('en')->anchor = $fields['anchor_en'];

        // Fill translatable data for russian
        $this->translateOrNew('ru')->name = $fields['name_ru'];
        $this->translateOrNew('ru')->anchor = $fields['anchor_ru'];

        $this->save();
    }
    public function remove()
    {
        try
        {
            $this->delete();
            $this->deleteTranslations();
        }
        catch (\Exception $e)
        {
            echo $e;
        }
    }
}
