@formField('select', [
    'name'       => 'columns',
    'label'      => 'Columns',
    'default'    => 2,
    'unpack'     => true,
    'options'    => collect([1, 2, 3])->map(function($i) {
        return [
            'value' => $i,
            'label' => $i,
        ];
    })->toArray(),
])

@formField('medias', [
    'name'         => 'image',
    'label'        => 'Images',
    'max'          => 5,
    'note'         => 'Add up to 5 images',
    'required'     => true,
    'withVideoUrl' => false,
])
