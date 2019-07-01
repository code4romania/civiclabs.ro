<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-locale type="a17-textfield" :attributes="{ label: 'Name', name: fieldName('name'), type: 'text', required: true, inStore: 'value' }" ></a17-locale><a17-repeater type="evalField" :name="repeaterName('evalField')" ></a17-repeater>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
