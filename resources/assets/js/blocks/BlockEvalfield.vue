<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-locale type="a17-textfield" :attributes="{ label: 'Label', name: fieldName('label'), type: 'text', required: true, inStore: 'value' }" ></a17-locale><a17-textfield label="Weight" :name="fieldName('weight')" type="number" :required="true" in-store="value" ></a17-textfield>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
