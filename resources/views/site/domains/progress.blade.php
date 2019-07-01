@php
    $stages = config('stages.domains');
    $count = count($stages);
    $current = $current ?? false;
    $index = array_search($current, $stages);


    if ($index < $count - 1) {
        $progress = (100 / $count) * ((2 * $index) + 1) / 2;
    } else {
        $progress = 100;
    }
@endphp

@if ($index !== false)
    <aside class="section has-background-white-bis">
        <div class="container">
            <h1 class="title is-size-4">{{ __('domain.stage.title') }}</h1>
            <progress class="progress is-primary is-large" value="{{ number_format($progress, 2) }}" max="100"></progress>

            <ul class="columns has-text-centered is-size-7-tablet">
                @foreach ($stages as $id => $stage)
                    @php
                        switch ($id <=> $index) {
                            case -1: $class = 'has-text-grey-light'; break;
                            case  0: $class = 'has-text-black has-text-weight-semibold'; break;
                            case  1: $class = 'has-text-grey-darker'; break;
                        }
                    @endphp
                    <li class="column {{ $class }}">{{ __("domain.stage.$stage") }}</li>
                @endforeach
            </ul>
        </div>
    </aside>
@endif
