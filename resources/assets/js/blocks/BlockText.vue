<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-singleselect label="Columns" :name="fieldName('columns')" :options='[{&quot;value&quot;:1,&quot;label&quot;:1},{&quot;value&quot;:2,&quot;label&quot;:2},{&quot;value&quot;:3,&quot;label&quot;:3}]' selected="1" :has-default-store="true" in-store="value" > </a17-singleselect><a17-vselect label="Drop cap" :name="fieldName('dropcap')" :options='[{&quot;value&quot;:0,&quot;label&quot;:&quot;No&quot;},{&quot;value&quot;:1,&quot;label&quot;:&quot;Yes&quot;}]' :has-default-store="true" size="large" in-store="inputValue" > </a17-vselect><a17-locale type="a17-wysiwyg" :attributes="{ label: 'Text', name: fieldName('text'), options: {&quot;modules&quot;:{&quot;toolbar&quot;:[{&quot;header&quot;:[2,3,false]},&quot;bold&quot;,&quot;italic&quot;,&quot;underline&quot;,&quot;strike&quot;,&quot;link&quot;,&quot;blockquote&quot;,{&quot;list&quot;:&quot;ordered&quot;},{&quot;list&quot;:&quot;bullet&quot;},{&quot;script&quot;:&quot;sub&quot;},{&quot;script&quot;:&quot;super&quot;},{&quot;align&quot;:&quot;&quot;},{&quot;align&quot;:&quot;center&quot;},{&quot;align&quot;:&quot;right&quot;},{&quot;clean&quot;:&quot;&quot;}],&quot;syntax&quot;:false}}, editSource: true, inStore: 'value' }" ></a17-locale>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
