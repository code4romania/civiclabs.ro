<?php

return [

    'posts' => [
        'title' => 'Blog',
        'module' => true,
    ],

    'pages' => [
        'title' => 'Pages',
        'module' => true,
    ],

    'solutions' => [
        'title' => 'Solutions',
        'route' => 'admin.solutions.solutions.index',
        'primary_navigation' => [
            'domains' => [
                'title' => 'Domains',
                'module' => true,
            ],
            'solutions' => [
                'title' => 'Solutions',
                'module' => true,
            ],
            'byproducts' => [
                'title' => 'Byproducts',
                'module' => true
            ],
        ],
    ],
    'applications' => [
        'title' => 'Applications',
        'route' => 'admin.applications.applicationForms.index',
        'primary_navigation' => [
            'applicationForms' => [
                'title' => 'Forms',
                'module' => true,
            ],
            'applicationSubmissions' => [
                'title' => 'Submissions',
                'module' => true,
            ],
            'applicationEvaluations' => [
                'title' => 'Evaluations',
                'module' => true,
            ],
            'dashboardUsers' => [
                'title' => 'Users',
                'module' => true,
            ],
        ],
    ],
    'partners' => [
        'title' => 'Partners',
        'module' => true
    ],
    'people' => [
        'title' => 'Team',
        'module' => true
    ],
    'featured' => [
        'title' => 'Features',
        'route' => 'admin.featured.navigation',
        'primary_navigation' => [
            'navigation' => [
                'title' => 'Navigation',
                'route' => 'admin.featured.navigation',
            ],
        ],
    ],
    'settings' => [
        'title' => 'Settings',
        'route' => 'admin.settings',
        'params' => [
            'section' => 'site'
        ],
        'primary_navigation' => [
            'site' => [
                'title' => 'Site',
                'route' => 'admin.settings',
                'params' => [
                    'section' => 'site'
                ]
            ],
            'social' => [
                'title' => 'Social',
                'route' => 'admin.settings',
                'params' => [
                    'section' => 'social'
                ]
            ],
        ]
    ],

];
