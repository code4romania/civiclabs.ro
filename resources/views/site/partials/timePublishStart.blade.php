@if ($item->publish_start_date)
    <time datetime="{{ $item->publish_start_date->format('Y-m-d') }}">
        @if ($item->publish_start_date->diffInDays() < 7)
            {{ $item->publish_start_date->diffForHumans() }}
        @else
            {{ $item->publish_start_date->formatLocalized('%d %B %Y') }}
        @endif
    </time>
@endif
