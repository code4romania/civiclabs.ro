@php
    $ngoType = (!$item->implementers->count()) ? ('applicants') : ('implementers');
    $ngos = $ngos ?? [];
@endphp

<aside class="solution-partners notification">
    <div class="container">
        <div class="columns is-vcentered">
            <div class="column is-one-quarter is-narrow">
                <div class="media is-vcentered">
                    @if('available' == $item->status)
                        <p class="is-size-7">
                            <a v-on:click="isSolutionModalFinancersActive = true">{{ __('solution.financer.missing') }}</a>
                        </p>
                    @else
                        <p class="is-size-7">
                            {{ __('solution.financer.exists') }}
                        </p>

                        @foreach ($item->financers as $financer)
                            @include('site.partials.partner', ['height' => 40, 'partner' => $financer, 'class' => 'media-right is-narrow'])
                        @endforeach
                    @endif

                </div>
            </div>

            <div class="column is-three-quarters is-narrow">
                <div class="media is-vcentered">

                    <p class="is-size-7">{{ __('solution.ngo.' . $ngoType) }}</p>

                    <c-partners-stripe
                        :partners="{{ json_encode($ngos) }}"
                    ></c-partners-stripe>

                </div>
            </div>
        </div>
    </div>
</aside>
