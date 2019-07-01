<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver'                => env('GLIDE_DRIVER', 'gd'),

    /*
    |--------------------------------------------------------------------------
    | Image source and cache
    |--------------------------------------------------------------------------
    |
    | Here you may configure the filesystem "disks" where Glide should look
    | for images and where to store their respective cached versions
    |
    | Supported Drivers: "local" and "s3"
    |
    */
    'source'                => env('GLIDE_SOURCE', 's3'),
    'source_prefix'         => env('GLIDE_SOURCE_PREFIX', ''),

    'cache'                 => env('GLIDE_CACHE', 'local'),
    'cache_prefix'          => env('GLIDE_CACHE_PREFIX', '.cache'),

    'max_image_size'        => env('GLIDE_MAX_IMAGE_SIZE', 5000*5000),
    'base_url'              => env('GLIDE_BASE_URL', '/img/'),

    'source_host'           => env('GLIDE_SOURCE_HOST', env('APP_URL')),
    'use_signed_urls'       => env('GLIDE_USE_SIGNED_URLS', false),
    'default_params'        => [
        'fm'   => 'jpg',
        'q'    => 90,
        'fit'  => 'contain',
    ],
    'lqip_default_params'   => [
        'fm'   => 'gif',
        'blur' => 100,
        'dpr'  => 1,
    ],
    'social_default_params' => [
        'fm'   => 'jpg',
        'w'    => 900,
        'h'    => 470,
        'fit'  => 'crop',
    ],
    'cms_default_params'    => [
        'q'    => 60,
        'fit'  => 'fill',
        'dpr'  => 1,
    ],
];
