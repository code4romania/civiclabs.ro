<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Models\DashboardUser;
use App\Models\Domain;
use App\Models\Solution;

class Partner extends Model implements Sortable
{
    use HasMedias, HasPosition;

    protected $fillable = [
        'published',
        'title',
        // 'main_partner',
        'website',
        'position',
        'featured',
        // 'public',
        // 'publish_start_date',
        // 'publish_end_date',
    ];

    // uncomment and modify this as needed if you use the HasTranslation trait
    // public $translatedAttributes = [
    //     'title',
    //     'description',
    //     'active',
    // ];

    // uncomment and modify this as needed if you use the HasSlug trait
    // public $slugAttributes = [
    //     'title',
    // ];

    // add checkbox fields names here (published toggle is itself a checkbox)
    public $checkboxes = [
        'published'
    ];

    // uncomment and modify this as needed if you use the HasMedias trait
    public $mediasParams = [
        'logo' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => false,
                ],
            ],
        ],
    ];

    public function financesDomains()
    {
        return $this->morphedByMany(Domain::class, 'financeable');
    }

    public function financesSolutions()
    {
        return $this->morphedByMany(Solution::class, 'financeable');
    }

    public function implementsSolutions()
    {
        return $this->morphedByMany(Solution::class, 'implementable');
    }

    public function developsSolutions()
    {
        return $this->morphedByMany(Solution::class, 'developable');
    }
}
