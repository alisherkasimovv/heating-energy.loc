<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CredentialTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'company_name',
        'company_address',
        'company_info_brief',
        'company_info_full',
        'anchor'
    ];
}
