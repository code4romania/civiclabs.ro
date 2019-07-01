<?php

namespace App\Models\Translations;

use A17\Twill\Models\Model;

class PageTranslation extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'active',
        'locale',
    ];
}
