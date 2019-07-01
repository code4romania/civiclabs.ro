<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class ByproductController extends ModuleController
{
    protected $moduleName = 'byproducts';
    protected $titleInDashboard = 'title';
    protected $previewView = 'site.byproducts.show';

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
