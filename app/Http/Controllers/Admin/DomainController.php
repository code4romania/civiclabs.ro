<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class DomainController extends ModuleController
{
    protected $moduleName = 'domains';
    protected $previewView = 'site.domains.show';

    protected $indexOptions = [
        'reorder' => true,
    ];

    protected $indexColumns = [
        'image' => [
            'thumb' => true,
            'field' => 'image',
            'variant' => [
                'role' => 'image',
                'crop' => 'default',
            ],
        ],
        'title' => [
            'title' => 'Title',
            'field' => 'title',
            'sort' => true,
        ],
    ];
}
