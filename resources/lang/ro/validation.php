<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Câmpul trebuie să fie acceptat.',
    'active_url'           => 'Câmpul nu este un URL valid.',
    'after'                => 'Câmpul trebuie să fie o dată după :date.',
    'after_or_equal'       => 'Câmpul trebuie să fie o dată ulterioară sau egală cu :date.',
    'alpha'                => 'Câmpul poate conține doar litere.',
    'alpha_dash'           => 'Câmpul poate conține doar litere, numere și cratime.',
    'alpha_num'            => 'Câmpul poate conține doar litere și numere.',
    'array'                => 'Câmpul trebuie să fie un array.',
    'before'               => 'Câmpul trebuie să fie o dată înainte de :date.',
    'before_or_equal'      => 'Câmpul trebuie să fie o dată înainte sau egală cu :date.',
    'between'              => [
        'numeric' => 'Câmpul trebuie să fie între :min și :max.',
        'file'    => 'Câmpul trebuie să fie între :min și :max kiloocteți.',
        'string'  => 'Câmpul trebuie să fie între :min și :max caractere.',
        'array'   => 'Câmpul trebuie să aibă între :min și :max elemente.',
    ],
    'boolean'              => 'Câmpul trebuie să fie adevărat sau fals.',
    'confirmed'            => 'Confirmarea :attribute nu se potrivește.',
    'date'                 => 'Câmpul nu este o dată validă.',
    'date_equals'          => 'The :attribute must be a date equal to :date.',
    'date_format'          => 'Câmpul trebuie să fie în formatul :format.',
    'different'            => 'Câmpurile :attribute și :other trebuie să fie diferite.',
    'digits'               => 'Câmpul trebuie să aibă :digits cifre.',
    'digits_between'       => 'Câmpul trebuie să aibă între :min și :max cifre.',
    'dimensions'           => 'Câmpul are dimensiuni de imagine nevalide.',
    'distinct'             => 'Câmpul are o valoare duplicat.',
    'email'                => 'Câmpul trebuie să fie o adresă de e-mail validă.',
    'exists'               => 'Câmpul selectat nu este valid.',
    'file'                 => 'Câmpul trebuie să fie un fișier.',
    'filled'               => 'Câmpul trebuie completat.',
    'gt'                   => [
        'numeric' => 'Câmpul trebuie să fie mai mare de :value.',
        'file'    => 'Câmpul trebuie să fie mai mare de :value kilobyți.',
        'string'  => 'Câmpul trebuie să fie mai mare de :value caractere.',
        'array'   => 'Câmpul trebuie să aibă mai multe de :value elemente.',
    ],
    'gte'                  => [
        'numeric' => 'Câmpul trebuie să fie mai mare sau egal cu :value.',
        'file'    => 'Câmpul trebuie să fie mai mare sau egal cu :value kilobyți.',
        'string'  => 'Câmpul trebuie să fie mai mare sau egal cu :value caractere.',
        'array'   => 'Câmpul trebuie să aibă :value elemente sau mai multe.',
    ],
    'image'                => 'Câmpul trebuie să fie o imagine.',
    'in'                   => 'Câmpul selectat nu este valid.',
    'in_array'             => 'Câmpul nu există în :other.',
    'integer'              => 'Câmpul trebuie să fie un număr întreg.',
    'ip'                   => 'Câmpul trebuie să fie o adresă IP validă.',
    'ipv4'                 => 'Câmpul trebuie să fie o adresă IPv4 validă.',
    'ipv6'                 => 'Câmpul trebuie să fie o adresă IPv6 validă.',
    'json'                 => 'Câmpul trebuie să fie un string JSON valid.',
    'lt'                   => [
        'numeric' => 'Câmpul trebuie să fie mai mic de :value.',
        'file'    => 'Câmpul trebuie să fie mai mic de :value kilobyți.',
        'string'  => 'Câmpul trebuie să fie mai mic de :value caractere.',
        'array'   => 'Câmpul trebuie să aibă mai puțin de :value elemente.',
    ],
    'lte'                  => [
        'numeric' => 'Câmpul trebuie să fie mai mic sau egal cu :value.',
        'file'    => 'Câmpul trebuie să fie mai mic sau egal cu :value kilobyți.',
        'string'  => 'Câmpul trebuie să fie mai mic sau egal cu :value caractere.',
        'array'   => 'Câmpul trebuie să aibă :value elemente sau mai puține.',
    ],
    'max'                  => [
        'numeric' => 'Câmpul nu poate fi mai mare de :max.',
        'file'    => 'Câmpul nu poate avea mai mult de :max kiloocteți.',
        'string'  => 'Câmpul nu poate avea mai mult de :max caractere.',
        'array'   => 'Câmpul nu poate avea mai mult de :max elemente.',
    ],
    'mimes'                => 'Câmpul trebuie să fie un fișier de tipul: :values.',
    'mimetypes'            => 'Câmpul trebuie să fie un fișier de tipul: :values.',
    'min'                  => [
        'numeric' => 'Câmpul nu poate fi mai mic de :min.',
        'file'    => 'Câmpul trebuie să aibă cel puțin :min kiloocteți.',
        'string'  => 'Câmpul trebuie să aibă cel puțin :min caractere.',
        'array'   => 'Câmpul trebuie să aibă cel puțin :min elemente.',
    ],
    'not_in'               => 'Câmpul selectat nu este valid.',
    'not_regex'            => 'Câmpul nu are un format valid.',
    'numeric'              => 'Câmpul trebuie să fie un număr.',
    'present'              => 'Câmpul trebuie să fie prezent.',
    'regex'                => 'Câmpul nu are un format valid.',
    'required'             => 'Câmpul este obligatoriu.',
    'required_if'          => 'Câmpul este necesar când :other este :value.',
    'required_unless'      => 'Câmpul este necesar, cu excepția cazului :other este in :values.',
    'required_with'        => 'Câmpul este necesar când există :values.',
    'required_with_all'    => 'Câmpul este necesar când există :values.',
    'required_without'     => 'Câmpul este necesar când nu există :values.',
    'required_without_all' => 'Câmpul este necesar când niciunul(una) dintre :values nu există.',
    'same'                 => 'Câmpul și :other trebuie să fie identice.',
    'size'                 => [
        'numeric' => 'Câmpul trebuie să fie :size.',
        'file'    => 'Câmpul trebuie să aibă :size kiloocteți.',
        'string'  => 'Câmpul trebuie să aibă :size caractere.',
        'array'   => 'Câmpul trebuie să aibă :size elemente.',
    ],
    'starts_with'          => 'The :attribute must start with one of the following: :values',
    'string'               => 'Câmpul trebuie să fie string.',
    'timezone'             => 'Câmpul trebuie să fie un fus orar valid.',
    'unique'               => 'Câmpul a fost deja folosit.',
    'uploaded'             => 'Câmpul nu a reușit încărcarea.',
    'url'                  => 'Câmpul nu este un URL valid.',
    'uuid'                 => 'Câmpul trebuie să fie un UUID valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
    ],

];
