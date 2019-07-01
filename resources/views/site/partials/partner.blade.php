@php
    $width = $width ?? 150;
    $class = $class ?? '';
@endphp

@if ($partner->hasImage('logo'))
    <div class="partner {{ $class }}">
        @if ($partner->website)
            <a href="{{ $partner->website }}" target="_blank" rel="noopener">
        @endif

        <img src="{{ $partner->image('logo', 'default', [
            'w'   => $width,
            'fm'  => 'png',
        ]) }}" alt="">

        @if ($partner->website)
            </a>
        @endif
    </div>
@endif

