<template>
    <div v-if="submitted" class="section">
        <div class="content has-text-grey has-text-centered">
           <p>
               <b-icon icon="check-circle" type="is-success" size="is-large"></b-icon>
           </p>
           <p v-text="$props.messageSuccess"></p>
        </div>
    </div>
    <form v-else @submit.prevent="submit">
        <template v-for="section, sectionIndex in sections">
            <b-collapse tag="section" class="block-form-section">
                <header slot="trigger" slot-scope="props" role="button" class="message is-primary is-small">
                    <h1 class="message-header">
                        <span>{{ section.title }}</span>
                        <b-icon :icon="props.open ? 'menu-down' : 'menu-up'" />
                    </h1>
                </header>

                <div v-if="section.description" class="message is-primary is-small">
                    <div class="message-body" v-html="section.description" />
                </div>

                <b-field
                    v-for="field, fieldIndex in section.fields"
                    :key="fieldIndex"
                    :label="field.label"
                    :addons="false"
                    customClass="is-small is-inline"
                >
                    <p class="help-text is-inline" v-if="field.help" v-text="field.help" />
                    <template v-if="field.type == 'file'">
                        <a v-if="field.template" :href="field.template.url" target="_blank" class="help-text is-inline is-link" v-text="field.template.label"></a>
                        <b-upload
                            class="is-block"
                            :required="field.required"
                            v-model="models[sectionIndex][fieldIndex].file">
                            <a class="button is-small">
                                <b-icon icon="attachment" size="is-small" />
                                <span v-if="!models[sectionIndex][fieldIndex].file" v-text="field.inputLabel" />
                                <span v-else v-text="models[sectionIndex][fieldIndex].file.name" />
                            </a>
                        </b-upload>
                    </template>

                    <template v-else-if="field.type == 'date'">
                        <b-datepicker
                            class="is-block"
                            v-model="models[sectionIndex][fieldIndex].date"
                            :min-date="new Date(field.minDate)"
                            :max-date="new Date(field.maxDate)"
                            :focused-date="new Date(field.focusedDate)"
                            icon="calendar-today" />
                    </template>

                    <template v-else-if="field.type == 'number'">
                        <b-input
                            class="is-block"
                            :required="field.required"
                            :type="field.type"
                            :maxlength="field.maxLength"
                            v-model="models[sectionIndex][fieldIndex].value"
                            :min="field.minValue"
                            :max="field.maxValue"
                            step="1"
                        />
                    </template>

                    <template v-else>
                        <b-input
                            class="is-block"
                            :required="field.required"
                            :type="field.type"
                            :maxlength="field.maxLength"
                            v-model="models[sectionIndex][fieldIndex].value"
                        />
                    </template>
                </b-field>
            </b-collapse>
        </template>

        <div class="card-content">
            <button class="button is-success is-small">
                <b-icon icon="send" size="is-small" />
                <span v-text="submitLabel"></span>
            </button>
        </div>
    </form>
</template>

<script>
    import axios from 'axios';
    import utils from '../utils';

    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
    };

    export default {
        name: 'CApplicationForm',
        props: {
            formId: {
                type: String,
                default: '',
            },
            sections: {
                type: Array,
                default: [],
            },
            action: {
                type: String,
                default: '',
            },
            submitLabel: {
                type: String,
                default: 'Send',
            },
            messageSuccess: {
                type: String,
                default: 'Your application was successfully submitted!',
            },
            messageError: {
                type: String,
                default: 'Something went wrong. Please try again later!',
            },
        },
        data() {
            let models = [],
                dateFields = [],
                fileFields = [];

            this.sections.forEach((section, sectionIndex) => {
                section.fields.map((field, fieldIndex) => {
                    if (typeof models[sectionIndex] == 'undefined') {
                        models[sectionIndex] = [];
                    }


                    models[sectionIndex][fieldIndex] = {
                        label: field.label,
                        value: '',
                    };

                    switch(field.type) {
                        case 'date':
                            models[sectionIndex][fieldIndex].date = null;
                            dateFields.push({
                                sectionIndex,
                                fieldIndex,
                            });
                            break;

                        case 'file':
                            models[sectionIndex][fieldIndex].file = null;
                            fileFields.push({
                                sectionIndex,
                                fieldIndex,
                            });
                            break;
                    }
                });
            });

            return {
                models: models,
                dateFields: dateFields,
                fileFields: fileFields,
                submitted: false,
            };
        },
        computed: {
            formData() {
                let formData = new FormData();

                this.models.forEach((section, sectionIndex) => {
                    section.forEach((field, fieldIndex) => {
                        formData.append(`data[${sectionIndex}][${fieldIndex}][label]`, field.label);
                        formData.append(`data[${sectionIndex}][${fieldIndex}][value]`, field.value);
                    });
                });

                return formData;
            },
        },
        methods: {
            submit() {
                axios.post(this.action, this.formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                }).then((response) => {
                    this.submitted = true;
                    this.clearLocalStorage();
                }).catch((response) => {
                    this.$toast.open({
                        message: this.$props.messageError,
                        type: 'is-danger',
                        position: 'is-bottom',
                    })
                });
            },
            saveToLocalStorage() {
                localStorage.setItem(this.formId, JSON.stringify(this.models));
            },
            restoreFromLocalStorage() {
                if (!localStorage.getItem(this.formId))
                    return;

                let localData = JSON.parse(localStorage.getItem(this.formId));

                this.dateFields.forEach((f) => {
                    let date = localData[f.sectionIndex][f.fieldIndex].date;

                    if (date != null) {
                        localData[f.sectionIndex][f.fieldIndex].date = new Date(date);
                    }
                });

                // Reset populated input fields
                this.fileFields.forEach((f) => {
                    localData[f.sectionIndex][f.fieldIndex].file = null;
                });

                this.models = localData;
            },
            clearLocalStorage() {
                localStorage.removeItem(this.formId);
            },
        },
        mounted() {
            this.dateFields.forEach((f) => {
                this.$watch(`models.${f.sectionIndex}.${f.fieldIndex}.date`, (val) => {
                    this.models[f.sectionIndex][f.fieldIndex].value = utils.defaultDateFormatter(val);
                });
            });

            this.fileFields.forEach((f) => {
                this.$watch(`models.${f.sectionIndex}.${f.fieldIndex}.file`, (val) => {
                    this.models[f.sectionIndex][f.fieldIndex].value = val;
                });
            });

            this.restoreFromLocalStorage();
        },
        created() {
            this.debouncedSaveToLocalStorage = utils.debounce(this.saveToLocalStorage, 1000);

        },
        watch: {
            models: {
                handler() {
                    this.debouncedSaveToLocalStorage();
                },
                deep: true,
            }
        }
    };
</script>
