<?php

return [

    'choose_bigger_image' => true,
    'oembed' => [
        'parameters' => 'Features',
    ],

    /**
     * This should match $embed-aspect-ratios values listed in:
     *   resources/assets/sass/variables/base/utilities/responsiveness.scss
     */
    'ratios' => [
        '21by9' => 9 / 21,
        '16by9' => 9 / 16,
        '3by4'  => 4 / 3,
        '4by3'  => 3 / 4,
        '1by1'  => 1 / 1,
    ]
];
