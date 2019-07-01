<?php

return [

    'homepage' => [
        'name' => 'Home',
        'buckets' => [
            'home_primary_feature' => [
                'name' => 'Home primary feature',
                'bucketables' => [
                    [
                        'module' => 'solutions',
                        'name' => 'solutions',
                        'scopes' => [
                            'published' => true
                        ],
                    ],
                ],
                'max_items' => 1,
            ],
            'home_secondary_features' => [
                'name' => 'Home secondary features',
                'bucketables' => [
                    [
                        'module' => 'solutions',
                        'name' => 'solutions',
                        'scopes' => [
                            'published' => true
                        ],
                    ],
                ],
                'max_items' => 10,
            ],
        ],
    ],
    'navigation' => [
        'name' => 'Navigation',
        'restricted' => false,
        'buckets' => [
            'header' => [
                'name' => 'Header menu',
                'bucketables' => [
                    [
                        'module' => 'page',
                        'name' => 'Pages',
                        'scopes' => [
                            'published' => true
                        ],
                    ],
                    [
                        'module' => 'domain',
                        'name' => 'Domains',
                        'scopes' => [
                            'published' => true
                        ],
                    ],
                    [
                        'module' => 'solution',
                        'name' => 'Solutions',
                        'scopes' => [
                            'published' => true
                        ],
                    ],
                    [
                        'module' => 'byproduct',
                        'name' => 'Byproducts',
                        'scopes' => [
                            'published' => true
                        ],
                    ],
                ],
                'max_items' => 10,
            ],
            'footer' => [
                'name' => 'Footer menu',
                'bucketables' => [
                    [
                        'module' => 'page',
                        'name' => 'Pages',
                        'scopes' => [
                            'published' => true
                        ],
                    ],
                ],
                'max_items' => 10,
            ],
        ],
    ],

];
