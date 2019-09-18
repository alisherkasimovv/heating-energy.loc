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

    public function recommendations()
    {
        return $this->morphMany(Recommendation::class, 'recommendation');
    }

    public function categories()
    {
        return $this->belongsTo(
            Category::class
        );
    }

    /*
     * CRUD
     */
    public static function add($fields)
    {
        $product = new static;

        // Fill translatable data for english
        $product->translateOrNew('en')->name = $fields['name_en'];
        $product->translateOrNew('en')->description = $fields['description_en'];
        $product->translateOrNew('en')->anchor = $fields['anchor_en'];

        // Fill translatable data for russian
        $product->translateOrNew('ru')->name = $fields['name_ru'];
        $product->translateOrNew('ru')->description = $fields['description_ru'];
        $product->translateOrNew('ru')->anchor = $fields['anchor_ru'];

        $product->category_id = $fields['category_id'];

        $product->save();

        /*
         * Saving images
         */
        if ($fields['images'] != null)
        {
            foreach ($fields['images'] as $item)
            {
                $image = new Image();
                try {
                    $image->uploadImage($item, 'products');
                } catch (\Exception $e) {
                    echo $e;
                }

                $product->images()->save($image);
            }
        }

        /*
         * Save characteristics of product
         */
        $iterator = 0;

        for ($i = 0; $i < $fields['char-size'] - 1; $i++)
        {
            $chars = array();
            foreach ($fields['characteristics'] as $item)
            {
                array_push($chars, $item[$iterator]);
            }

            $char = new Characteristic();
            $char = $char->add($chars);
            $product->characteristics()->save($char);
            $iterator++;
        }

        /*
         * Registering product suggestions
         */
        if ($fields['suggestProducts'] != null)
        {
            foreach ($fields['suggestProducts'] as $recommendation)
            {
                $suggestion = new Recommendation();
                $suggestion->registerProductRecommendation($recommendation);
                $product->recommendations()->save($suggestion);
            }
        }

        return $product;
    }

    public function edit($fields)
    {
        // Fill translatable data for english
        $this->translateOrNew('en')->name = $fields['name_en'];
        $this->translateOrNew('en')->description = $fields['description_en'];
        $this->translateOrNew('en')->anchor = $fields['anchor_en'];

        // Fill translatable data for russian
        $this->translateOrNew('ru')->name = $fields['name_ru'];
        $this->translateOrNew('ru')->description = $fields['description_ru'];
        $this->translateOrNew('ru')->anchor = $fields['anchor_ru'];

        $this->category_id = $fields['category_id'];
        $this->save();

        /*
         * Save characteristics of product
         */
        $iterator = 0;
        $this->characteristics()->delete();
        for ($i = 0; $i < $fields['char-size'] - 1; $i++)
        {
            $chars = array();
            foreach ($fields['characteristics'] as $item)
            {
                array_push($chars, $item[$iterator]);
            }
            $char = new Characteristic();
            $char = $char->add($chars);
            $this->characteristics()->save($char);
            $iterator++;
        }

        /*
         * Registering product suggestions
         */
        if ($fields['suggestProducts'] != null)
        {
            // Delete all product recommendations
            $this->recommendations()->delete();
            foreach ($fields['suggestProducts'] as $recommendation)
            {
                $suggestion = new Recommendation();
                $suggestion->registerProductRecommendation($recommendation);
                $this->recommendations()->save($suggestion);
            }
        }

        /*
         * Upload image to storage
         */
        if ($fields['images'] != null)
        {

            // Delete all old images from storage
            if ($fields['oldImages'] != null)
            {
                foreach ($fields['oldImages'] as $old)
                {
                    $this->images()->removeImage($old);
                    // Delete old image from database
                    $this->images()->delete();
                }
            }

            // Upload new images to storage
            foreach ($fields['images'] as $img)
            {
                $image = new Image();
                try {
                    $image->uploadImage($img, 'products');
                } catch (\Exception $e) {
                    echo $e;
                }

                // Save image into database
                $this->images()->save($image);
            }
        }
    }

    public function remove()
    {
        try
        {
            $this->categories()->delete();
            $this->recommendations()->delete();
            $this->characteristics()->delete();
            $this->images()->delete();
            $this->delete();
            $this->deleteTranslations();
        }
        catch(\Exception $e)
        {
            echo $e;
        }
    }

    public function incrementViews($view)
    {
        $view++;
        $this->views = $view;
        $this->save();
    }

    public function getCharacteristics()
    {
        return $this->characteristics()->pluck( 'product_id');
    }
}
