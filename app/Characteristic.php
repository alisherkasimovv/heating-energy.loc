<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use Translatable;

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

        // Fill translatable data for english
        $characteristic->translateOrNew('en')->key = $fields['key'];
        $characteristic->translateOrNew('en')->value = $fields['value'];
        $characteristic->translateOrNew('en')->anchor = $fields['anchor'];

        // Fill translatable data for russian
        $characteristic->translateOrNew('ru')->key = $fields['key'];
        $characteristic->translateOrNew('ru')->value = $fields['value'];
        $characteristic->translateOrNew('ru')->anchor = $fields['anchor'];

        $characteristic->save();
        return $characteristic;
    }

    public function edit($fields)
    {
        // Fill translatable data for english
        $this->translateOrNew('en')->key = $fields['key'];
        $this->translateOrNew('en')->value = $fields['value'];
        $this->translateOrNew('en')->anchor = $fields['anchor'];

        // Fill translatable data for russian
        $this->translateOrNew('ru')->key = $fields['key'];
        $this->translateOrNew('ru')->value = $fields['value'];
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
