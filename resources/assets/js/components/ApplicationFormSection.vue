<template>
    <b-collapse tag="section" class="block-form-section">
            <header slot="trigger" slot-scope="props" role="button" class="message is-primary is-small">
                <h1 class="message-header">
                    <span>{{ title }}</span>
                    <b-icon :icon="props.open ? 'menu-down' : 'menu-up'" />
                </h1>
            </header>

            <div v-if="description" class="message is-primary is-small">
                <div class="message-body" v-html="description" />
            </div>

            <b-field
                v-for="field, fieldIndex in fields"
                :key="fieldIndex"
                :label="field.label"
                :addons="false"
                customClass="is-small is-inline"
            >
                <p class="help-text is-inline" v-if="field.help" v-text="field.help" />
                <template v-if="field.type == 'file'">
                    <b-upload
                        class="is-block"
                        :required="field.required"
                        >
                        <a class="button is-small">
                            <b-icon icon="attachment" size="is-small" />
                            <span v-text="field.inputLabel" />
                        </a>
                    </b-upload>
                </template>

                <template v-else-if="field.type == 'date'">
                    <b-datepicker
                        class="is-block"

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

                    />
                </template>
            </b-field>
        </b-collapse>
</template>

<script>
    export default {
        name: 'CApplicationFormSection',
        props: {
            title: {
                type: String,
                default: '',
            },
            description: {
                type: String,
                default: '',
            },
            fields: {
                type: Array,
                default: [],
            },
        },
    };
</script>
