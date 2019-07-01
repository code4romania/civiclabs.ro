<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class PartnerController extends ModuleController
{
    protected $moduleName = 'partners';

    protected $indexOptions = [
        'feature'     => true,
        'permalink'   => false,
        'reorder'     => true,
    ];

    protected $indexColumns = [
        'image' => [
            'thumb' => true,
            'field' => 'image',
            'variant' => [
                'role' => 'logo',
                'crop' => 'default',
            ],
        ],
        'title' => [
            'title' => 'Title',
            'field' => 'title',
            'sort' => true,
        ],
        'website' => [
            'title' => 'Website',
            'field' => 'website',
        ],
    ];
}
