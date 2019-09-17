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
//            $char->add($chars);
            $product->characteristics()->save($char);
            $iterator++;
        }

        /*
         * Registering post suggestions
         */
        if ($fields['suggestPosts'] != null)
        {
            foreach ($fields['suggestPosts'] as $recommendation)
            {
                $suggestion = new Recommendation();
                $suggestion->registerPostRecommendation($recommendation);
                $product->recommendations()->save($suggestion);
            }
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

        $this->save();

        /*
         * Upload image to storage
         */
        if ($fields['images'] != null)
        {
            $image = new Image();

            // Delete all old images from storage
            if ($fields['oldImages'] != null)
            {
                foreach ($fields['oldImages'] as $old)
                {
                    $image->removeImage($old);
                    // Delete old image from database
                    $this->images()->delete();
                }
            }

            // Upload new images to storage
            foreach ($fields['images'] as $img)
            {
                try {
                    $image->uploadImage($img, 'products');
                } catch (\Exception $e) {
                    echo $e;
                }

                // Save image into database
                $this->images()->save($img);
            }
        }

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
//            $char->add($chars);
            $this->characteristics()->save($char);
            $iterator++;
        }

        /*
         * Registering post suggestions
         */
        if ($fields['suggestPosts'] != null)
        {
            // Delete all post recommendations
            $this->recommendations()->delete();
            foreach ($fields['suggestPosts'] as $recommendation)
            {
                $suggestion = new Recommendation();
                $suggestion->registerPostRecommendation($recommendation);
                $this->recommendations()->save($suggestion);
            }
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

    public function incrementViews($view)
    {
        $view++;
        $this->views = $view;
        $this->save();
    }
}
