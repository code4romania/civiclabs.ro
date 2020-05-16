<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class SolutionController extends ModuleController
{
    protected $moduleName = 'solutions';

    protected $previewView = 'site.solutions.show';

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

    /*
     * Relations to eager load for the index view
     */
    protected $indexWith = [
        'translations',
        'medias',
    ];
}
