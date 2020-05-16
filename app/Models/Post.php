<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class Post extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasRevisions, HasPosition;

    protected $with = [
        'translations',
        'medias',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'publish_start_date',
        'publish_end_date',
    ];

    protected $fillable = [
        'published',
        'title',
        // 'subtitle',
        'description',
        'position',
        // 'public',
        // 'featured',
        'publish_start_date',
        'publish_end_date',
    ];

    // uncomment and modify this as needed if you use the HasTranslation trait
    public $translatedAttributes = [
        'title',
        'subtitle',
        'description',
        'active',
    ];

    // uncomment and modify this as needed if you use the HasSlug trait
    public $slugAttributes = [
        'title',
    ];

    // add checkbox fields names here (published toggle is itself a checkbox)
    public $checkboxes = [
        'published'
    ];

    public $mediasParams = [
        'image' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 3 / 2,
                ],
            ],
        ],
    ];

    public function people()
    {
        return $this->morphToMany(\App\Models\Person::class, 'personable');
    }
}
