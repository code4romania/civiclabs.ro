<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-locale type="a17-textfield" :attributes="{ label: 'Title', name: fieldName('title'), type: 'text', maxlength: 100, inStore: 'value' }" ></a17-locale><a17-locale type="a17-wysiwyg" :attributes="{ label: 'Description', name: fieldName('description'), options: {&quot;modules&quot;:{&quot;toolbar&quot;:[{&quot;header&quot;:[2,3,false]},&quot;bold&quot;,&quot;italic&quot;,&quot;underline&quot;,&quot;strike&quot;,&quot;link&quot;,&quot;blockquote&quot;,{&quot;list&quot;:&quot;ordered&quot;},{&quot;list&quot;:&quot;bullet&quot;},{&quot;script&quot;:&quot;sub&quot;},{&quot;script&quot;:&quot;super&quot;},{&quot;align&quot;:&quot;&quot;},{&quot;align&quot;:&quot;center&quot;},{&quot;align&quot;:&quot;right&quot;},{&quot;clean&quot;:&quot;&quot;}],&quot;syntax&quot;:false}}, editSource: true, inStore: 'value' }" ></a17-locale><a17-locale type="a17-textfield" :attributes="{ label: 'Button text', name: fieldName('btn_text'), type: 'text', maxlength: 100, inStore: 'value' }" ></a17-locale><a17-locale type="a17-textfield" :attributes="{ label: 'Link text', name: fieldName('a_text'), type: 'text', maxlength: 100, inStore: 'value' }" ></a17-locale><a17-locale type="a17-textfield" :attributes="{ label: 'Link url', name: fieldName('a_url'), type: 'text', placeholder: 'http://link-example.com', maxlength: 100, inStore: 'value' }" ></a17-locale>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
