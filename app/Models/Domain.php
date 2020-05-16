<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class Domain extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasPosition;

    protected $fillable = [
        'published',
        // 'title',
        'stage',
        'position',
        'research_percentage',
        'prototyping_percentage',
        // 'public',
        // 'featured',
        // 'publish_start_date',
        // 'publish_end_date',
    ];

    // uncomment and modify this as needed if you use the HasTranslation trait
    public $translatedAttributes = [
        'title',
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

    // uncomment and modify this as needed if you use the HasMedias trait
    public $mediasParams = [
        'image' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => false,
                ],
            ],
        ],
    ];

    public function getHasSubdomainsAttribute()
    {
        return !!$this->domains()->count();
    }

    public function domains()
    {
        return $this->morphToMany(\App\Models\Domain::class, 'domainable');
    }

    public function subdomains()
    {
        return $this->domains()
            ->withPivot(['position'])
            ->orderBy('pivot_position', 'asc')
            ->publishedInListings();
    }

    public function parent()
    {
        return $this->morphedByMany(\App\Models\Domain::class, 'domainable')->publishedInListings();
    }

    public function financers()
    {
        return $this->morphToMany(\App\Models\Partner::class, 'financeable');
    }

    public function solutions()
    {
        return $this->morphedByMany(\App\Models\Solution::class, 'domainable');
    }
}
