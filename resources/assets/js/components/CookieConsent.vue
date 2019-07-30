<template>
    <div class="notices is-bottom">
        <b-notification position="is-bottom-right" :aria-close-label="close" @close="this.closePopup">
            <div class="content">
                <p class="is-size-7" v-text="message"></p>
                <a :href="moreUrl" class="button is-small is-link" v-text="moreLabel"></a>
            </div>
        </b-notification>
    </div>
</template>

<script>
    import axios from 'axios';

    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
    };

    export default {
        name: 'CCookieConsent',
        props: {
            action: {
                type: String,
                default: '',
            },
            message: {
                type: String,
                default: '',
            },
            close: {
                type: String,
                default: '',
            },
            moreLabel: {
                type: String,
                default: '',
            },
            moreUrl: {
                type: String,
                default: '',
            },
        },
        methods: {
            closePopup: function() {
                axios.post(this.action);
            },
        },
    };
</script>
