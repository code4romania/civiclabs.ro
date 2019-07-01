@php
    $classList = [];

    if ($block->input('columns')) {
        $classList[] = 'column-count';
        $classList[] = 'column-count-'. $block->input('columns');
    }

    if ($block->input('dropcap')) {
        $classList[] = 'has-drop-cap';
    }
@endphp

<section class="section block block-text">
    <div class="container">
        <div class="content {{ implode(' ', $classList) }}">
            {!! $block->translatedinput('text') !!}
        </div>
    </div>
</section>
