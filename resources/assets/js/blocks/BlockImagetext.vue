<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-inputframe label="Image" name="medias.image" :required="true" > <a17-mediafield :name="fieldName('image')" crop-context="image" :required="true" :with-add-info="false" :with-video-url="false" :with-caption="false" ></a17-mediafield> </a17-inputframe><a17-vselect label="Image position" :name="fieldName('position')" :options='[{&quot;value&quot;:&quot;left&quot;,&quot;label&quot;:&quot;Left&quot;},{&quot;value&quot;:&quot;right&quot;,&quot;label&quot;:&quot;Right&quot;}]' :selected="{&quot;value&quot;:&quot;left&quot;,&quot;label&quot;:&quot;Left&quot;}" :has-default-store="true" size="large" in-store="inputValue" > </a17-vselect><a17-singleselect label="Image width" :name="fieldName('width')" :options='[{&quot;value&quot;:&quot;quarter&quot;,&quot;label&quot;:&quot;25%&quot;},{&quot;value&quot;:&quot;third&quot;,&quot;label&quot;:&quot;33%&quot;},{&quot;value&quot;:&quot;half&quot;,&quot;label&quot;:&quot;50%&quot;}]' selected="third" :has-default-store="true" in-store="value" > </a17-singleselect><a17-locale type="a17-wysiwyg" :attributes="{ label: 'Text', name: fieldName('text'), options: {&quot;modules&quot;:{&quot;toolbar&quot;:[{&quot;header&quot;:[2,3,false]},&quot;bold&quot;,&quot;italic&quot;,&quot;underline&quot;,&quot;strike&quot;,&quot;link&quot;,&quot;blockquote&quot;,{&quot;color&quot;:[]},{&quot;list&quot;:&quot;ordered&quot;},{&quot;list&quot;:&quot;bullet&quot;},{&quot;script&quot;:&quot;sub&quot;},{&quot;script&quot;:&quot;super&quot;},{&quot;align&quot;:&quot;&quot;},{&quot;align&quot;:&quot;center&quot;},{&quot;align&quot;:&quot;right&quot;},{&quot;clean&quot;:&quot;&quot;}],&quot;syntax&quot;:false}}, editSource: true, inStore: 'value' }" ></a17-locale>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
