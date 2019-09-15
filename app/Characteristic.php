<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use Translatable;

    const ANCHOR_RU = "anchor_ru";
    const ANCHOR_EN = "anchor_en";

    protected $fillable = ['product_id'];

    public $translatedAttributes = [
        'key',
        'value',
        'anchor'
    ];

    /*
     * Relations
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public static function add($fields)
    {
        $characteristic = new static;

        $characteristic->translateOrNew('en')->key = $fields[0];
        $characteristic->translateOrNew('en')->value = $fields[1];

        $characteristic->translateOrNew('ru')->key = $fields[2];
        $characteristic->translateOrNew('ru')->value = $fields[3];


        $characteristic->translateOrNew('en')->anchor = self::ANCHOR_EN;
        $characteristic->translateOrNew('ru')->anchor = self::ANCHOR_RU;

        $characteristic->save();
        return $characteristic;
    }

    public function edit($fields)
    {
        // Fill translatable data for english
        $this->translateOrNew('en')->key = $fields['keys_en'];
        $this->translateOrNew('en')->value = $fields['values_en'];

        // Fill translatable data for russian
        $this->translateOrNew('ru')->key = $fields['keys_ru'];
        $this->translateOrNew('ru')->value = $fields['values_ru'];

        $this->translateOrNew('en')->anchor = self::ANCHOR_EN;
        $this->translateOrNew('ru')->anchor = self::ANCHOR_RU;

        $this->save();
    }

    public function saveKeys($characteristic, $keys)
    {


        $this->saveOtherFields($characteristic);
    }

    public function saveValues($characteristic, $values)
    {

    }

    private function saveOtherFields($characteristic)
    {

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
