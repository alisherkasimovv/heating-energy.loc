<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;

    protected $fillable = ['status'];

    public $translatedAttributes = [
        'name',
        'description',
        'slug',
        'anchor'
    ];

    /*
     * Relations
     */
    public function characteristics()
    {
        return $this->hasMany(Characteristic::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'image');
    }

    /*
     * CRUD
     */
    public static function add($fields, $characteristics, $images)
    {
        $product = new static;

        foreach ($images as $item)
        {
            $image = new Image();
            try {
                $image->uploadImage($item, 'products');
            } catch (\Exception $e) {
                echo $e;
            }

            $product->images()->save($image);
        }

        foreach ($characteristics as $item)
        {
            $char = new Characteristic();
            $char->save($item);
        }

        // Fill translatable data for english
        $product->translateOrNew('en')->name = $fields['name_en'];
        $product->translateOrNew('en')->description = $fields['description_en'];
        $product->translateOrNew('en')->anchor = $fields['anchor_en'];

        // Fill translatable data for russian
        $product->translateOrNew('ru')->name = $fields['name_ru'];
        $product->translateOrNew('ru')->description = $fields['description_ru'];
        $product->translateOrNew('ru')->anchor = $fields['anchor_ru'];


        $product->save();
        return $product;
    }

    public function edit($fields)
    {
        // Upload image to storage
        $image = new Image();

        $this->images()->delete();

        $image->removeImage($fields['oldLogo']);
        try {
            $image->uploadImage($fields['logo'], 'credentials');
        } catch (\Exception $e) {
            echo $e;
        }

        $this->images()->save($image);

        // Fill translatable data for english
        $this->translateOrNew('en')->name = $fields['name'];
        $this->translateOrNew('en')->description = $fields['description'];
        $this->translateOrNew('en')->anchor = $fields['anchor'];

        // Fill translatable data for russian
        $this->translateOrNew('ru')->name = $fields['name'];
        $this->translateOrNew('ru')->description = $fields['description'];
        $this->translateOrNew('ru')->anchor = $fields['anchor'];

        $this->save();
    }

    public function remove()
    {
        try
        {
            $this->delete();
            $this->deleteTranslations();
        }
        catch(\Exception $e)
        {
            echo $e;
        }
    }
}
