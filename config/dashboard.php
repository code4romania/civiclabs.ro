<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dashboard URL
    |--------------------------------------------------------------------------
     */
    'url'  => env('DASHBOARD_URL', 'dashboard.' . env('APP_URL')),
    'path' => env('DASHBOARD_PATH', ''),

    'user_roles' => [
        'financer'  => 'Financer',
        'evaluator' => 'Evaluator',
    ],
];
