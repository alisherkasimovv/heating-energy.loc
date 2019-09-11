<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Carbon\Carbon;
    use Translatable;

    protected $fillable = [
        'date',
        'status'
    ];

    public $translatedAtributes = [
        'title',
        'brief',
        'text',
        'slug',
        'anchor'
    ];

    /*
     * Relations
     */
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
    public static function add($fields, $recommendations)
    {
        $post = new static();

        // Uploading image
        $image = new Image();
        try {
            $image->uploadImage($fields['image'], 'posts');
        } catch (\Exception $e) {
            echo $e;
        }
        $post->images()->save($image);

        // Registering recommendations
        foreach ($recommendations as $recommendation)
        {
            $suggestion = new Recommendation();
            $suggestion->registerRecommendation($recommendation->id);
            $post->recommendations()->save($suggestion);
        }

        // Fill translatable data for english
        $post->translateOrNew('en')->title = $fields['title_en'];
        $post->translateOrNew('en')->brief = $fields['brief_en'];
        $post->translateOrNew('en')->text = $fields['text_en'];
        $post->translateOrNew('en')->anchor = $fields['anchor_en'];

        // Fill translatable data for russian
        $post->translateOrNew('ru')->title = $fields['title_ru'];
        $post->translateOrNew('ru')->brief = $fields['brief_ru'];
        $post->translateOrNew('ru')->text = $fields['text_ru'];
        $post->translateOrNew('ru')->anchor = $fields['anchor_ru'];

        $post->date = Carbon::now()->toDateString();

        $post->save();
        return $post;
    }

    public function edit($fields)
    {

        // Upload image to storage
        $image = new Image();
        $this->images()->delete();
        $image->removeImage($fields['oldImage']);
        try {
            $image->uploadImage($fields['image'], 'posts');
        } catch (\Exception $e) {
            echo $e;
        }
        $this->images()->save($image);

        // Fill translatable data for english
        $this->translateOrNew('en')->title = $fields['title_en'];
        $this->translateOrNew('en')->brief = $fields['brief_en'];
        $this->translateOrNew('en')->text = $fields['text_en'];
        $this->translateOrNew('en')->anchor = $fields['anchor_en'];

        // Fill translatable data for russian
        $this->translateOrNew('ru')->title = $fields['title_ru'];
        $this->translateOrNew('ru')->brief = $fields['brief_ru'];
        $this->translateOrNew('ru')->text = $fields['text_ru'];
        $this->translateOrNew('ru')->anchor = $fields['anchor_ru'];

        $this->date = Carbon::now()->toDateString();

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
