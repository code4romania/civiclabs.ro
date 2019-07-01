@if ($partners->count())
    <div class="columns is-multiline is-vcentered is-spaced-between">
        <div class="column is-narrow">
            <p class="is-size-6 has-text-centered-mobile">{{ $label }}:</p>
        </div>
        <div class="column is-narrow columns is-vcentered is-centered is-gapless is-multiline is-mobile">
            @foreach ($partners as $partner)
                @include('site.partials.partner', [
                    'width'   => 125,
                    'partner' => $partner,
                    'class'   => 'column is-narrow',
                ])
            @endforeach
        </div>
    </div>
@endif
