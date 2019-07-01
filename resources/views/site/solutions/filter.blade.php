@php
    $domains = \App\Models\Domain::publishedInListings()->withActiveTranslations()->ordered()->get();

    $activeStatuses = $items->pluck('status')->toArray();
@endphp

<div class="columns is-right">
    <div class="column is-6-tablet is-offset-6-tablet is-4-widescreen is-offset-8-widescreen">
        <b-field>
            <b-select v-model="activeSolutionFilter" expanded icon="filter-outline" type="is-danger" placeholder="{{ __('solution.filterBy') }}">
                <option value="">{{ __('solution.showAll') }}</option>
                <optgroup label="{{ __('solution.status') }}">
                    @foreach (config('stages.solutions') as $status)
                        <option {{ !in_array($status, $activeStatuses) ? 'disabled' : '' }} value="status.{{ $status }}">{{ __("solution.status.$status")}}</option>
                    @endforeach
                </optgroup>

                <optgroup label="{{ __('solution.domain') }}">
                    @foreach ($domains as $domain)
                        <option {{ !$domain->solutions->count() ? 'disabled' : '' }} value="domain.{{ $domain->slug }}">
                            {{ $domain->title }}
                        </option>
                    @endforeach
                </optgroup>
            </b-select>
        </b-field>
    </div>
</div>

