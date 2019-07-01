@php
    $view = sprintf('%s.%s', config('twill.block_editor.block_views_path'), 'textBoxItem');


    switch ($block->input('columns')) {
        case 1:
        case 2:
            $column = sprintf('is-%d-tablet', 12 / $block->input('columns'));
            break;

        default:
            $column = sprintf('is-6-tablet is-%d-widescreen', floor(12 / $block->input('columns')));
            break;
    }
@endphp

<section class="section block block-textboxes">
    <div class="container">
        <div class="section is-slim is-down">
            <header class="content">
                <h1 class="title is-size-4">{{ $block->translatedinput('title') }}</h1>
                    {!! $block->translatedinput('description') !!}
            </header>

            <div class="columns is-multiline is-down">
                @foreach ($block->children as $index => $item)
                    {!! view($view)->with('index', $index)->with('block', $item)->with('column', $column)->render() !!}
                @endforeach
            </div>
        </div>
    </div>
</section>
