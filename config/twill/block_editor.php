<?php

return [

    'block_single_layout'         => 'layouts.block',
    'block_preview_render_childs' => false,
    'browser_route_prefixes' => [
        'byproducts' => 'solutions',
        'domains'    => 'solutions',
        'solutions'  => 'solutions',
    ],
    'blocks' => [
        'accordion' => [
            'title'      => 'Accordion',
            'icon'       => 'media-list',
            'component'  => 'a17-block-accordion',
        ],
        'embed' => [
            'title'      => 'Embed',
            'icon'       => 'revision-single',
            'component'  => 'a17-block-embed',
        ],
        'quote' => [
            'title'      => 'Quote',
            'icon'       => 'quote',
            'component'  => 'a17-block-quote',
        ],
        'imageFullWidth' => [
            'title'      => 'Full width image',
            'icon'       => 'image',
            'component'  => 'a17-block-imagefullwidth',
        ],
        'imageGrid' => [
            'title'      => 'Image grid',
            'icon'       => 'fix-grid',
            'component'  => 'a17-block-imagegrid',
        ],
        'imageText' => [
            'title'      => 'Image with text',
            'icon'       => 'image-text',
            'component'  => 'a17-block-imagetext',
        ],
        'cta' => [
            'title'      => 'Call to action',
            'icon'       => 'colors',
            'component'  => 'a17-block-cta',
        ],
        'newsletter' => [
            'title'      => 'Subscribe to newsletter',
            'icon'       => 'info',
            'component'  => 'a17-block-newsletter',
        ],
        'text' => [
            'title'      => 'Text',
            'icon'       => 'text',
            'component'  => 'a17-block-text',
        ],
        'textBox' => [
            'title'      => 'Text boxes',
            'icon'       => 'text-2col',
            'component'  => 'a17-block-textbox',
        ],
        'byproducts' => [
            'title'      => 'Byproducts',
            'icon'       => 'text',
            'component'  => 'a17-block-byproducts',
        ],
        'domains' => [
            'title'      => 'Domains',
            'icon'       => 'text',
            'component'  => 'a17-block-domains',
        ],
        'solutions' => [
            'title'      => 'Solutions',
            'icon'       => 'text',
            'component'  => 'a17-block-solutions',
        ],
        'people' => [
            'title'      => 'People',
            'icon'       => 'text',
            'component'  => 'a17-block-people',
        ],
        'partners' => [
            'title'      => 'Partners',
            'icon'       => 'text',
            'component'  => 'a17-block-partners',
        ],
        'formSection' => [
            'title'      => 'Form Section',
            'icon'       => 'editor',
            'component'  => 'a17-block-formsection',
        ],
        'evalSection' => [
            'title'      => 'Evaluation Section',
            'icon'       => 'check',
            'component'  => 'a17-block-evalsection',
        ],
    ],
    'repeaters' => [
        'accordionItem' => [
            'title'      => 'Item',
            'trigger'    => 'Add accordion item',
            'component'  => 'a17-block-accordionitem',
            'max'        => 20,
        ],
        'textBoxItem' => [
            'title'      => 'Text box',
            'trigger'    => 'Add text box',
            'component'  => 'a17-block-textboxitem',
            'max'        => 20,
        ],
        'formField' => [
            'title'      => 'Form Field',
            'trigger'    => 'Add field',
            'component'  => 'a17-block-formfield',
            'max'        => 20,
        ],
        'evalField' => [
            'title'      => 'Evaluation Criterion',
            'trigger'    => 'Add criterion',
            'component'  => 'a17-block-evalfield',
            'max'        => 20,
        ],
    ],

];
