<template>
    <div class="notices is-bottom">
        <b-notification :active.sync="isActive" position="is-bottom-right" :aria-close-label="close" @close="this.closePopup">
            <div class="content">
                <p class="is-size-7" v-text="message"></p>
                <div class="buttons are-small">
                    <b-button type="is-success" @click="this.closePopup" v-text="agreeLabel" />
                    <a :href="moreUrl" class="button is-text" v-text="moreLabel" />
                </div>
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
            agreeLabel: {
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
        data() {
            return {
                isActive: true,
            };
        },
        methods: {
            closePopup: function() {
                axios.post(this.action);
                this.isActive = false;
            },
        },
    };
</script>
