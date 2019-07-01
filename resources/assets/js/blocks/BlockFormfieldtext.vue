<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-locale type="a17-textfield" :attributes="{ label: 'Name', name: fieldName('name'), type: 'text', required: true, inStore: 'value' }" ></a17-locale><a17-locale type="a17-textfield" :attributes="{ label: 'Help', name: fieldName('help'), type: 'text', note: 'Help text, ', inStore: 'value' }" ></a17-locale><a17-vselect label="Type" :name="fieldName('type')" :options='[{&quot;value&quot;:&quot;text&quot;,&quot;label&quot;:&quot;Text&quot;},{&quot;value&quot;:&quot;textarea&quot;,&quot;label&quot;:&quot;Textarea&quot;},{&quot;value&quot;:&quot;url&quot;,&quot;label&quot;:&quot;URL&quot;},{&quot;value&quot;:&quot;email&quot;,&quot;label&quot;:&quot;Email&quot;},{&quot;value&quot;:&quot;number&quot;,&quot;label&quot;:&quot;Number&quot;}]' :selected="{&quot;value&quot;:&quot;text&quot;,&quot;label&quot;:&quot;Text&quot;}" :has-default-store="true" size="large" in-store="inputValue" > </a17-vselect><a17-textfield label="Min" :name="fieldName('min')" type="number" note="Minimum value for field type &quot;Number&quot;, character count for every other field type." in-store="value" ></a17-textfield><a17-textfield label="Max" :name="fieldName('max')" type="number" note="Maximum value for field type &quot;Number&quot;, character count for every other field type." in-store="value" ></a17-textfield>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
