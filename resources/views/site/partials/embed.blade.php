@php
    if (is_null($embed))
        return;

    $search = $closest = $ratio = null;

    if (!is_null($embed->aspectRatio)) {
        $search = $embed->aspectRatio;
    } elseif (!is_null($embed->imageWidth) && !is_null($embed->imageHeight)) {
        $search = round(($embed->imageHeight / $embed->imageWidth) * 100, 3);
    }

    if (!is_null($search)) {
        foreach (config('embeds.ratios') as $id => $item) {
            // Normalize calculated ratio
            $item *= 100;

            if (is_null($closest) || abs($search - $closest) > abs($item - $search)) {
                $ratio   = $id;
                $closest = $item;
            }
        }
    }
@endphp

@if ($ratio)
    <div class="embed-responsive is-{{ $ratio ?? '4by3' }}">
        {!! $embed->code !!}
    </div>
@else
    {!! $embed->code !!}
@endif
