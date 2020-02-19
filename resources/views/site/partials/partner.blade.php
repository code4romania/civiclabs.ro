@php
    $height = $height ?? 40;
    $class = $class ?? '';
@endphp

@if ($partner->hasImage('logo'))
    <div class="partner {{ $class }}">
        @if ($partner->website)
            <a href="{{ $partner->website }}" target="_blank" rel="noopener">
        @endif

        <img src="{{ $partner->image('logo', 'default', [
                'h' => $height,
                'fm' => 'png'
        ]) }}" alt="{{ $partner->title }}">

        @if ($partner->website)
            </a>
        @endif
    </div>
@endif
