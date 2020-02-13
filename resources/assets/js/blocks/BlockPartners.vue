<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-locale type="a17-textfield" :attributes="{ label: 'Section title', name: fieldName('title'), type: 'text', required: true, inStore: 'value' }" ></a17-locale><a17-locale type="a17-wysiwyg" :attributes="{ label: 'Description', name: fieldName('description'), options: {&quot;modules&quot;:{&quot;toolbar&quot;:[{&quot;header&quot;:[2,3,false]},&quot;bold&quot;,&quot;italic&quot;,&quot;underline&quot;,&quot;strike&quot;,&quot;link&quot;,&quot;blockquote&quot;,{&quot;list&quot;:&quot;ordered&quot;},{&quot;list&quot;:&quot;bullet&quot;},{&quot;script&quot;:&quot;sub&quot;},{&quot;script&quot;:&quot;super&quot;},{&quot;align&quot;:&quot;&quot;},{&quot;align&quot;:&quot;center&quot;},{&quot;align&quot;:&quot;right&quot;},{&quot;clean&quot;:&quot;&quot;}],&quot;syntax&quot;:false}}, editSource: true, inStore: 'value' }" ></a17-locale><a17-singleselect label="Logo size" :name="fieldName('width')" :options='[{&quot;value&quot;:&quot;quarter&quot;,&quot;label&quot;:&quot;25%&quot;},{&quot;value&quot;:&quot;third&quot;,&quot;label&quot;:&quot;33%&quot;},{&quot;value&quot;:&quot;half&quot;,&quot;label&quot;:&quot;50%&quot;}]' selected="third" :has-default-store="true" in-store="value" > </a17-singleselect><a17-vselect label="Display partner names" :name="fieldName('displayNames')" :options='[{&quot;value&quot;:0,&quot;label&quot;:&quot;No&quot;},{&quot;value&quot;:1,&quot;label&quot;:&quot;Yes&quot;}]' :has-default-store="true" size="large" in-store="inputValue" > </a17-vselect><a17-inputframe label="Partners" name="browsers.partners"> <a17-browserfield :name="fieldName('partners')" item-label="partners" :max="20" :wide="false" endpoint="/partners/browser" :endpoints="[]" modal-title="Attach partners" :draggable="true" >Add up to 20 partners</a17-browserfield></a17-inputframe>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
