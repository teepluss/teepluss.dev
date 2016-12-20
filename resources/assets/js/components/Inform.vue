<template>
  <form>
    <input v-model="name">
    <p><span>{{ name }}</span></p>
  </form>
</template>
<script>
  export default {
    name: 'inform',
    data () {
      return {
        name: ''
      }
    }
  }
</script>
<style></style>
