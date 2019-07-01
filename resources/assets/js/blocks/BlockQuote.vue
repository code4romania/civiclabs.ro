<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-locale type="a17-textfield" :attributes="{ label: 'Quote', name: fieldName('quote'), type: 'textarea', required: true, maxlength: 250, rows: 4, inStore: 'value' }" ></a17-locale><a17-locale type="a17-textfield" :attributes="{ label: 'Author', name: fieldName('author'), type: 'text', required: true, maxlength: 100, inStore: 'value' }" ></a17-locale><a17-locale type="a17-textfield" :attributes="{ label: 'Affiliation', name: fieldName('affiliation'), type: 'text', maxlength: 100, inStore: 'value' }" ></a17-locale>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
