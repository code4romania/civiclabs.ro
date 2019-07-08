<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Repositories\PartnerRepository;

class DashboardUserController extends ModuleController
{
    protected $moduleName = 'dashboardUsers';

    protected $indexOptions = [
        'permalink' => false,
    ];

    protected $titleColumnKey = 'name';
    protected $titleFormKey = 'name';

    protected $indexColumns = [
        'name' => [
            'title'        => 'Name',
            'field'        => 'name',
            'sort'         => false,
        ],
        'user_role' => [
            'title'        => 'Role',
            'field'        => 'user_role',
        ],
        'details'  => [
            'title'        => 'Details',
            'field'        => 'userRoleDetails'
        ],
    ];

    protected $browserColumns = [
        'name' => [
            'title' => 'Name',
            'field' => 'name',
        ],
        'role' => [
            'title' => 'Role',
            'field' => 'user_role',
        ],
    ];

    protected $filters = [
        'role' => 'user_role',
    ];

    protected function indexData($request)
    {
        return [
            'roleList' => collect(config('dashboard.user_roles'))->map(function ($label) {
                return [
                    'label' => ucfirst($label),
                    'value' => $label,
                ];
            })->values()->toArray(),
        ];
    }
}
