<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['url', 'image_id', 'image_type'];

    /*
     * Relations
     */
    public function images()
    {
        return $this->morphTo();
    }

    /**
     * Uploading image to file system.
     * @param $image
     * @param $folder
     * @return string
     * @throws \Exception
     */
    public function uploadImage($image, $folder)
    {
        if ($image == null) return NULL;

        $this->removeImage($image);
        $filename = $this->generateRandomStringName(15) . '.' . $image->extension();
        $this->url = $image->storeAs('/uploads/' . $folder, $filename);
    }

    public function removeImage($image)
    {
        if ($image != null)
            Storage::delete($image);
    }

    private function generateRandomStringName($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $characters[rand(0, strlen($characters))];
        }
        return $str;
    }
}
