<?php

namespace App\Models\Translations;

use A17\Twill\Models\Model;

class PersonTranslation extends Model
{
    protected $fillable = [
        'title',
        'fields',
        'bio',
        'active',
        'locale',
    ];
}
