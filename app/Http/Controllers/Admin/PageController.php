<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use Illuminate\Http\Request;

class PageController extends ModuleController
{
    protected $moduleName = 'pages';

    protected $permalinkBase = '';

    protected $previewView = 'site.pages.show';

    protected $indexOptions = [
        'reorder' => true,
    ];

    protected function indexData($request)
    {
        return [
            'nested'      => true,
            'nestedDepth' => 2, // this controls the allowed depth in UI
        ];
    }

    protected function transformIndexItems($items)
    {
        return $items->toTree();
    }

    protected function indexItemData($item)
    {
        return ($item->children ? [
            'children' => $this->getIndexTableData($item->children),
        ] : []);
    }
}
