<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Credential extends Model
{
    use Translatable;

    protected $fillable = [
        'phone',
        'email',
        'facebook',
        'telegram',
        'instagram',
        'whatsapp',
        'logo'
    ];

    public $translatedAttributes = [
        'company_name',
        'company_address',
        'company_info_brief',
        'company_info_full',
        'anchor'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'image');
    }

    /*
     * CRUD
     */

    public static function add($fields) {
        $credential = new static;

        $image = new Image();
        try {
            $image->uploadImage($fields['logo'], 'credentials');
        } catch (\Exception $e) {
            echo $e;
        }
        $credential->images()->save($image);

        // Fill non-translatable data
        $credential->phone = $fields['phone'];
        $credential->email = $fields['email'];
        $credential->facebook = $fields['facebook'];
        $credential->telegram = $fields['telegram'];
        $credential->instagram = $fields['instagram'];
        $credential->whatsapp = $fields['whatsapp'];

        // Fill translatable data for english
        $credential->translateOrNew('en')->company_name = $fields['company_name_en'];
        $credential->translateOrNew('en')->company_address = $fields['company_address_en'];
        $credential->translateOrNew('en')->company_info_brief = $fields['company_info_brief_en'];
        $credential->translateOrNew('en')->company_info_full = $fields['company_info_full_en'];
        $credential->translateOrNew('en')->anchor = $fields['anchor_en'];

        // Fill translatable data for russian
        $credential->translateOrNew('ru')->company_name = $fields['company_name_ru'];
        $credential->translateOrNew('ru')->company_address = $fields['company_address_ru'];
        $credential->translateOrNew('ru')->company_info_brief = $fields['company_info_brief_ru'];
        $credential->translateOrNew('ru')->company_info_full = $fields['company_info_full_ru'];
        $credential->translateOrNew('ru')->anchor = $fields['anchor_ru'];

        $credential->save();
        return $credential;
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

        // Fill non-translatable data
        $this->phone = $fields['phone'];
        $this->email = $fields['email'];
        $this->facebook = $fields['facebook'];
        $this->telegram = $fields['telegram'];
        $this->instagram = $fields['instagram'];
        $this->whatsapp = $fields['whatsapp'];

        // Update translatable data for english
        $this->translateOrNew('en')->company_name = $fields['company_name_en'];
        $this->translateOrNew('en')->company_address = $fields['company_address_en'];
        $this->translateOrNew('en')->company_info_brief = $fields['company_info_brief_en'];
        $this->translateOrNew('en')->company_info_full = $fields['company_info_full_en'];

        // Update translatable data for russian
        $this->translateOrNew('ru')->company_name = $fields['company_name_ru'];
        $this->translateOrNew('ru')->company_address = $fields['company_address_ru'];
        $this->translateOrNew('ru')->company_info_brief = $fields['company_info_brief_ru'];
        $this->translateOrNew('ru')->company_info_full = $fields['company_info_full_ru'];

        $this->save();
    }

    public function remove()
    {
        (new Image)->removeImage($this->image);
        $this->images()->delete();

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

    public function getAllData()
    {
        $all = Credential::all();
        return $all->getTranslationsArray();
    }
}
