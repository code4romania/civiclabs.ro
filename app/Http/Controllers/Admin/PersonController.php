<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class PersonController extends ModuleController
{
    protected $moduleName = 'people';

    protected $titleColumnKey = 'name';
    protected $titleFormKey = 'name';
    protected $titleInDashboard = 'name';
    protected $permalinkBase = 'team';

    protected $previewView = 'site.people.show';

    protected $indexOptions = [
        'permalink' => true,
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
        'name' => [
            'title' => 'Name',
            'field' => 'name',
            'sort' => true,
        ],
        'title' => [
            'title' => 'Title',
            'field' => 'title',
            'sort' => true,
        ],
    ];

    protected function indexData($request)
    {
        return [
            'translateTitle' => false
        ];
    }
}
