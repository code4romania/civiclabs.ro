@if (!session('checkboxConsent' . str_replace(' ', '-', strtolower(trim($block->translatedinput('title'))))))
    <c-cookie-consent
        title = "{{ $block->translatedinput('title') }}"
        message = "{{ strip_tags($block->translatedinput('description')) }}"
        close="close notification"
        agree-label="{{ $block->translatedinput('btn_text') }}"
        more-label="{{ $block->translatedinput('a_text') }}"
        more-url="{{ $block->translatedinput('a_url') }}"
        action="{{ route('session.checkboxConsent', ['identifier'
            => str_replace(' ', '-', strtolower(trim($block->translatedinput('title'))))]) }}"
    ></c-cookie-consent>
@endif
