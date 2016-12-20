<template>
  <span class="help-block">
    <slot></slot>
  </span>
</template>
<script>
  export default {
    name: 'form-error',
    props: ['errors']
  }
</script>
