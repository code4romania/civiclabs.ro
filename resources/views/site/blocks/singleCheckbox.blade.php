@if (!session('checkboxConsent'))
    <c-cookie-consent
        title = "{{ $block->translatedinput('title') }}"
        message = "{{ strip_tags($block->translatedinput('description')) }}"
        close="close notification"
        agree-label="{{ $block->translatedinput('btn_text') }}"
        more-label="{{ $block->translatedinput('a_text') }}"
        more-url="{{ route('pages.show', ['page' => 'gdpr']) }}"
        action="{{ route('session.checkboxConsent') }}"
    ></c-cookie-consent>
@endif
