<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacteristicTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'key',
        'value',
        'anchor'
    ];
}
