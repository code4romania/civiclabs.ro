<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-locale type="a17-textfield" :attributes="{ label: 'Section title', name: fieldName('title'), type: 'text', required: true, inStore: 'value' }" ></a17-locale><a17-locale type="a17-wysiwyg" :attributes="{ label: 'Description', name: fieldName('description'), options: {&quot;modules&quot;:{&quot;toolbar&quot;:[{&quot;header&quot;:[2,3,false]},&quot;bold&quot;,&quot;italic&quot;,&quot;underline&quot;,&quot;strike&quot;,&quot;link&quot;,&quot;blockquote&quot;,{&quot;list&quot;:&quot;ordered&quot;},{&quot;list&quot;:&quot;bullet&quot;},{&quot;script&quot;:&quot;sub&quot;},{&quot;script&quot;:&quot;super&quot;},{&quot;align&quot;:&quot;&quot;},{&quot;align&quot;:&quot;center&quot;},{&quot;align&quot;:&quot;right&quot;},{&quot;clean&quot;:&quot;&quot;}],&quot;syntax&quot;:false}}, editSource: true, inStore: 'value' }" ></a17-locale><a17-inputframe label="Solutions" name="browsers.solutions"> <a17-browserfield :name="fieldName('solutions')" item-label="solutions" :max="20" :wide="false" endpoint="/solutions/solutions/browser" :endpoints="[]" modal-title="Attach solutions" :draggable="true" >Add up to 20 solutions</a17-browserfield></a17-inputframe>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
