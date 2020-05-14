@php
    $columns = collect([
        'evaluator' => [
            'sortable' => true,
        ],
        'evaluation_created_at' => [
            'sortable' => true,
        ],
        'evaluation_updated_at' => [
            'sortable' => true,
        ],
        'evaluation_total' => [
            'sortable' => true,
            'numeric'  => true,
        ],
    ])->map('mapTableColumns')->values();
@endphp

<section class="card block block-form-section">
    <header class="message is-primary is-marginless">
        <h2 class="message-header is-size-6 is-size-5-tablet is-marginless">
            <span>{{ __('dashboard.evaluation') }}</span>
        </h2>
    </header>

    <b-table class="box" detailed hoverable :data="{{ $evalData }}" :columns="{{ $columns }}">
        <template slot="detail" slot-scope="props">
            <div class="message is-primary" v-if="props.row.note">
                <div class="message-body">
                    <p class="is-marginless is-size-7 has-text-weight-bold">{{ __('dashboard.table.note') }}</p>
                    <p v-text="props.row.note"></p>
                </div>
            </div>

            <div v-if="props.row.evaluation_updated_at == '-'">
                {{ __('dashboard.table.vote.empty') }}
            </div>

            <div class="message is-light is-marginless" v-for="section in props.row.details">
                <div class="message-header is-size-6">
                    <span v-text="section.title"></span>
                    <span class="tag is-large" v-text="section.total"></span>
                </div>
                <div class="message-body">
                    <div class="columns is-centered" v-for="criterion, criterionIndex in section.criteria">
                        <div class="column" v-text="criterion.label"></div>
                        <div class="column is-narrow">
                            <span class="tag is-large" v-text="criterion.value"></span>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </b-table>
</section>
