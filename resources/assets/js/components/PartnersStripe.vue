<template>
    <div class="column is-full">
        <swiper class="swiper is-fullwidth" :options="options">
            <swiper-slide v-for="partner in partners" :key="partner.title" class="ql-align-center">
                <img :src="partner.image" :alt="partner.title" class="is-block logo">
            </swiper-slide>
            <div class="swiper-button-prev" slot="button-prev"></div>
            <div class="swiper-button-next" slot="button-next"></div>
        </swiper>
    </div>
</template>

<script>
    import { swiper, swiperSlide } from 'vue-awesome-swiper'
    import 'swiper/dist/css/swiper.css'

    export default {
        name: 'CPartnersStripe',
        components: {
            swiper,
            swiperSlide
        },

        props: {
            partners: {
                type: Array,
                default: () => [],
            },
            options: {
                type: Object,
                default: () => ({
                    centeredSlides: false,
                    slidesPerView: 4,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                        disabledClass: 'is-hidden',
                        hiddenClass: 'is-hidden'
                    },
                    autoplay: {
                        delay: 2000,
                        disableOnInteraction: false
                    },
                    breakpoints: {
                        1024: {
                            slidesPerView: 4
                        },
                        768: {
                            slidesPerView: 3
                        },
                        640: {
                            slidesPerView: 2
                        },
                        320: {
                            slidesPerView: 1
                        },
                    },
                }),
            }
        },
    }
</script>
