<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-textfield label="Label" :name="fieldName('label')" type="text" :required="true" :maxlength="50" in-store="value" ></a17-textfield><a17-textfield label="URL" :name="fieldName('url')" type="text" :required="true" in-store="value" ></a17-textfield>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
