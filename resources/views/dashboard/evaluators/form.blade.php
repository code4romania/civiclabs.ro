<section class="card block block-form-section">
    <header class="message is-primary is-marginless">
        <h2 class="message-header is-size-6 is-size-5-tablet is-marginless">
            <span>{{ __('dashboard.evaluation') }}</span>
        </h2>
    </header>

    <c-evaluation-form
        action="{{ $formAction }}"
        :sections="{{ $evalSections }}"
        :initial-data="{{ $evalData }}"
        :read-only="{!! json_encode(!$submission->form->accepts_evaluations) !!}"
        message-success="{{ __('dashboard.event.submit.success') }}"
        message-error="{{ __('dashboard.event.submit.error') }}"
        label-section-total="{{  __('dashboard.table.section_total') }}"
        label-section-average="{{  __('dashboard.table.section_average') }}"
        label-evaluation-total="{{  __('dashboard.table.evaluation_total') }}"
        label-evaluation-average="{{  __('dashboard.table.evaluation_average') }}"
    ></c-evaluation-form>
</section>
