@if ($research_percentage || $prototyping_percentage)
    <aside class="section has-background-white-bis">
        <div class="container">
            <div class="columns">
                <div class="column is-half">
                    <h1 class="title is-size-4">{{ __('domain.stage.title.research') }}</h1>
                    <b-progress type="is-primary" size="is-medium" :value="{{ $research_percentage ?? 0 }}" show-value format="percent"></b-progress>
                </div>
                <div class="column">
                    <h1 class="title is-size-4">{{ __('domain.stage.title.prototyping') }}</h1>
                    <b-progress type="is-primary" size="is-medium" :value="{{ $prototyping_percentage ?? 0 }}" show-value format="percent"></b-progress>
                </div>
            </div>
        </div>
    </aside>
@endif
