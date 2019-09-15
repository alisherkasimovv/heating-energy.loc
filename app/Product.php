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

        // Store images
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

        // Save characteristics of product
        $iterator = 0;

        for ($i = 0; $i < $fields['char-size']; $i++)
        {
            $chars = array();
            foreach ($fields['characteristics'] as $item)
            {
                array_push($chars, $item[$iterator]);

            }
            $char = new Characteristic();
            $char->add($chars);
            $product->characteristics()->save($char);
            $iterator++;
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

        // Upload image to storage
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

        // Updating characteristics of product
        for ($count= 0; $count < $fields["keys_en"]; $count++)
        {
            $keyEN = "";
            $keyRU = "";
            $valueEN = "";
            $valueRU = "";


            if ($fields)

                if ($fields['keys'] != null)
                {
                    $this->characteristics()->delete();
                    foreach ($fields['keys'] as $item)
                    {
                    }
                }

            $char = new Characteristic();
            $char->edit($item);
            $this->characteristics()->save($char);
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
}
