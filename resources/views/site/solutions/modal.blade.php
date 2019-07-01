<b-modal :active.sync="isSolutionModalFinancersActive">
    <div class="card">
        <div class="card-header">
            <p class="card-header-title">
                {{ __('solution.modal.title') }}
            </p>
        </div>
        <div class="card-content">
            <div class="content">
                <p>{{ __('solution.modal.financers.content') }}</p>
            </div>

            <div class="columns is-centered">
                <div class="column is-6">
                    <a
                        class="button is-success is-medium is-fullwidth"
                        href="mailto:contact@civiclabs.ro?subject={{ __('solution.modal.mailto.subject') }}">{{ __('solution.modal.button') }}</a>

                </div>
            </div>
        </div>
    </div>
</b-modal>
