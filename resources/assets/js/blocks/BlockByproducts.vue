<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-inputframe label="Byproducts" name="browsers.byproducts"> <a17-browserfield :name="fieldName('byproducts')" item-label="byproducts" :max="2" :wide="false" endpoint="/solutions/byproducts/browser" :endpoints="[]" modal-title="Attach byproducts" :draggable="true" >Add up to 2 byproducts</a17-browserfield></a17-inputframe>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
