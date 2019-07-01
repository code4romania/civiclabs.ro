<template>
    <form @submit.prevent="submit">
        <div v-for="section, sectionIndex in sections" class="message is-light is-marginless">
            <div class="message-header is-size-6">
                <span>{{ section.title }}</span>
                <span class="tag is-large">{{ sectionAverage[sectionIndex].toPrecision(3) }}</span>
            </div>
            <div class="message-body">
                <div class="columns is-centered" v-for="criterion, criterionIndex in section.criteria">
                    <div class="column">
                        {{ criterion.label }}
                    </div>
                    <div class="column is-narrow">
                        <b-numberinput
                            v-model="points[sectionIndex][criterionIndex]"
                            type="is-primary"
                            required="true"
                            min="1"
                            max="5"
                            step="0.1"
                            size="is-small"
                            :disabled="readOnly"
                        ></b-numberinput>
                    </div>
                </div>
            </div>
        </div>

        <div class="message is-dark is-marginless">
            <div class="message-header is-size-6">
                <span>Total</span>
                <span class="tag is-dark is-large">{{ total.toPrecision(3) }}</span>
            </div>
        </div>

        <div class="collapse-content">
            <b-field label="Note (optional)">
                <b-input
                    v-model="note"
                    type="textarea"
                    :disabled="readOnly"
                    ></b-input>
            </b-field>
            <div class="buttons is-right">
                <button class="button is-success" :disabled="readOnly">
                    <span>Save</span>
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    import axios from 'axios';

    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
    };

    export default {
        name: 'CEvaluationForm',
        props: {
            sections: {
                type: Array,
                default: () => [],
            },
            initialData: {
                type: Object,
                default: () => ({
                    'points': [],
                    'note': '',
                }),
            },
            readOnly: {
                type: Boolean,
                default: false,
            },
            action: {
                type: String,
                default: '',
            },
            messageSuccess: {
                type: String,
                default: 'Your evaluation was successfully saved!',
            },
            messageError: {
                type: String,
                default: 'Something went wrong. Please try again later!',
            },
        },
        data() {
            let points = [];

            this.sections.forEach((section, sectionIndex) => {
                section.criteria.map((criterion, criterionIndex) => {
                    if (typeof points[sectionIndex] == 'undefined') {
                        points[sectionIndex] = [];
                    }

                    points[sectionIndex][criterionIndex] = this.getPointValue(sectionIndex, criterionIndex);
                });
            });

            return {
                points: points,
                note: this.initialData.note || '',
            };
        },
        computed: {
            sectionAverage() {
                return this.points.map(s => s.reduce((a, b) => a + b) / s.length);
            },
            total() {
                return this.sectionAverage.reduce((a, b) => a + b);
            },
            formData() {
                return {
                    data: this.points,
                    note: this.note,
                }
            },
        },
        methods: {
            getPointValue(sectionIndex, criterionIndex) {
                if (typeof this.initialData.points == 'undefined'
                    || typeof this.initialData.points[sectionIndex] == 'undefined'
                    || typeof this.initialData.points[sectionIndex][criterionIndex] == 'undefined'
                ) {
                    if (this.readOnly)
                        return null;

                    return 1;
                }

                return this.initialData.points[sectionIndex][criterionIndex];
            },
            rand(min, max) {
                return parseFloat((Math.random() * (max - min) + min).toPrecision(2));
            },
            submit() {
                axios.post(this.action, this.formData).then((response) => {
                    this.$toast.open({
                        message: this.$props.messageSuccess,
                        type: 'is-success',
                        position: 'is-bottom',
                    })
                }).catch((response) => {
                    this.$toast.open({
                        message: this.$props.messageError,
                        type: 'is-danger',
                        position: 'is-bottom',
                    })
                })
            },
        },
    };
</script>
