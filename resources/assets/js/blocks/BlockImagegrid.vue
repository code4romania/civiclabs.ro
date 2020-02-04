<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-singleselect label="Columns" :name="fieldName('columns')" :options='[{&quot;value&quot;:1,&quot;label&quot;:1},{&quot;value&quot;:2,&quot;label&quot;:2},{&quot;value&quot;:3,&quot;label&quot;:3}]' selected="2" :has-default-store="true" in-store="value" > </a17-singleselect><a17-inputframe label="Images" name="medias.image" :required="true" > <a17-slideshow :name="fieldName('image')" :max="5" crop-context="image" :required="true" :with-video-url="false" >Add up to 5 images</a17-slideshow> </a17-inputframe> 
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
