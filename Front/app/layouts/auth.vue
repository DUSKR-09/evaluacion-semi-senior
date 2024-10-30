<script setup lang="ts">

definePageMeta({
  middleware: ['sanctum:guest'],
});

</script>

<template>
  <h1>Login</h1>

  <slot/>

</template>

<style scoped>

</style>