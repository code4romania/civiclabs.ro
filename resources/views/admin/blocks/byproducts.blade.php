@formField('browser', [
    'routePrefix' => 'solutions',
    'moduleName'  => 'byproducts',
    'name'        => 'byproducts',
    'label'       => 'Byproducts',
    'max'         => 2,
])

<div style="margin-top: 15px !important;">
    Icon <a href="https://material.io/resources/icons/?style=baseline"  target="_blank">(see all icons here)</a>
</div>

@formField('select', [
    'name' => 'icon',
    'label' => '',
    'placeholder' => 'Add title icon',
    'options' => collect(config('icons'))
        ->map(function($icon) {
            return ['value' => $icon, 'label' => $icon];
        })
        ->prepend(['value' => '', 'label' => 'no icon'])
        ->toArray(),
])

@formField('color', [
    'name'           => 'background_color',
    'label'          => 'Title background color',
])

@formField('color', [
    'name'           => 'text_color',
    'label'          => 'Title text color',
])
