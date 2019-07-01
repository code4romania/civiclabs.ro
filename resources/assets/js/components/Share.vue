<template>
    <b-dropdown class="has-button" aria-role="list">
        <a slot="trigger">
            <b-icon size="is-medium" icon="share"></b-icon>
            <slot/>
        </a>
        <b-dropdown-item
            @click="popup(url, platform.uri)"
            v-for="platform in platforms"
            :key="platform.label"
            class="sharer" aria-role="listitem"
        >
            <div class="media">
                <b-icon class="media-left" :icon="platform.id"></b-icon>
                <div class="media-content" v-text="platform.label"></div>
            </div>
        </b-dropdown-item>
    </b-dropdown>
</template>

<script>
    export default {
        name: 'CShare',
        props: [
            'url',
        ],
        data() {
            return {
                platforms: [
                    {
                        'uri'   : 'https://www.facebook.com/sharer/sharer.php?u=',
                        'id'    : 'facebook',
                        'label' : 'Facebook',
                    },
                    {
                        'uri'   : 'https://twitter.com/intent/tweet?url=',
                        'id'    : 'twitter',
                        'label' : 'Twitter',
                    },
                    {
                        'uri'   : 'http://www.linkedin.com/shareArticle?mini=true&url=',
                        'id'    : 'linkedin',
                        'label' : 'LinkedIn',
                    },
                ],
            }
        },
        methods: {
            popup: function(url, sharer) {
                let popupHeight = 550,
                    popupWidth = 780,
                    posY = Math.floor( (window.outerHeight - popupHeight) / 2),
                    posX = Math.floor( (window.outerWidth - popupWidth) / 2);

                let popup = window.open(sharer + encodeURIComponent(url), 'social', `width=${popupWidth},height=${popupHeight},left=${posX},top=${posY},location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1`);

                if (popup) {
                    popup.focus();
                }
            }
        }
    }
</script>
