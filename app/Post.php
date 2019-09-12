<?php

namespace App;

use Carbon\Carbon;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Translatable;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    protected $fillable = [
        'date',
        'status'
    ];

    public $translatedAttributes = [
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
    public static function add($fields, $sPosts, $sProducts)
    {
        $post = new static();

        $post->status = $post->toggleStatus($fields['status']);

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

        /*
         * Registering post suggestions
         */
        if ($sPosts != null)
        {
            foreach ($sPosts as $recommendation)
            {
                $suggestion = new Recommendation();
                $suggestion->registerPostRecommendation($recommendation);
                $post->recommendations()->save($suggestion);
            }
        }

        /*
         * Registering product suggestions
         */
        if ($sProducts != null)
        {
            foreach ($sProducts as $recommendation)
            {
                $suggestion = new Recommendation();
                $suggestion->registerProductRecommendation($recommendation);
                $post->recommendations()->save($suggestion);
            }
        }

        /*
         * Uploading image
         */
        $image = new Image();
        try {
            $image->uploadImage($fields['image'], 'posts');
        } catch (\Exception $e) {
            echo $e;
        }
        $post->images()->save($image);


        return $post;
    }

    public function edit($fields)
    {


        $this->status = $this->toggleStatus($fields['status']);

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

    public function toggleStatus($status)
    {
        if ($status == 0) {
            return Post::IS_DRAFT;
        }

        return Post::IS_PUBLIC;
    }
}
