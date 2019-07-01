<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-textfield label="URL" :name="fieldName('url')" type="text" :required="true" note="The embed is generated automatically from this url" placeholder="https://" in-store="value" ></a17-textfield>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
