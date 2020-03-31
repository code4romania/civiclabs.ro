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
        'applicant' => 'Applicant',
    ],

    'application_submissions_statuses' => [
        'received',
        'evaluation',
        'rejected',
        'accepted',
    ],

    'show_solutions_with_status' => ['available'],
];
