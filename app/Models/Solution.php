<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Models\ApplicationEvaluation;
use App\Models\ApplicationForm;
use App\Models\ApplicationSubmission;
use App\Models\DashboardUser;
use App\Models\Domain;
use App\Models\Partner;

class Solution extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasPosition;

    protected $fillable = [
        'published',
        'status',
        'prototype',
        'video',
        'repositories',
        'position',
    ];

    protected $casts = [
        'repositories' => 'array',
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
                    'ratio' => 3 / 2,
                ],
            ],
        ],
        'grid' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 3 / 2,
                ],
            ],
        ],
    ];

    public function financers()
    {
        return $this->morphToMany(Partner::class, 'financeable');
    }

    public function developers()
    {
        return $this->morphToMany(Partner::class, 'developable');
    }

    public function implementers()
    {
        return $this->morphToMany(Partner::class, 'implementable');
    }

    public function domains()
    {
        return $this->morphToMany(Domain::class, 'domainable');
    }

    public function applicationForms()
    {
        return $this->morphToMany(ApplicationForm::class, 'formable');
    }

    public function applicationSubmissions()
    {
        return $this->hasMany(ApplicationSubmission::class)
            ->orderBy('created_at', 'desc');
    }

    public function evaluators()
    {
        return $this->morphToMany(DashboardUser::class, 'evaluable', null, null, 'user_id')
            ->where('user_role', 'evaluator');
    }

    public function getHasApplicationsOpenAttribute()
    {
        return !!$this->applicationForms->count();
    }
}
