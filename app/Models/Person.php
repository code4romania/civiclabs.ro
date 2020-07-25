<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class Person extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasPosition;

    protected $with = [
        'translations',
        'medias',
        'slugs',
    ];

    protected $fillable = [
        'name',
        'published',
        'position',
        'facebook',
        'twitter',
        'linkedin',
    ];

    // uncomment and modify this as needed if you use the HasTranslation trait
    public $translatedAttributes = [
        'title',
        'bio',
        'active',
        'fields',
    ];

    // uncomment and modify this as needed if you use the HasSlug trait
    public $slugAttributes = [
        'name',
    ];

    // add checkbox fields names here (published toggle is itself a checkbox)
    public $checkboxes = [
        'published'
    ];

    // uncomment and modify this as needed if you use the HasMedias trait
    public $mediasParams = [
        'image' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 1 / 1,
                ],
            ],
        ],
    ];

    public function domains()
    {
        return $this->morphToMany(\App\Models\Domain::class, 'domainable');
    }

    public function solutions()
    {
        return $this->morphedByMany(\App\Models\Solution::class, 'personable');
    }

    public function byproducts()
    {
        return $this->morphedByMany(\App\Models\Byproduct::class, 'personable');
    }

    public function posts()
    {
        return $this->morphedByMany(\App\Models\Post::class, 'personable');
    }

    public function latestPosts()
    {
        return $this->posts()->orderBy('created_at', 'desc')->take(4);
    }

    public function getTitleInDashboardAttribute()
    {
        return $this->name;
    }
}
