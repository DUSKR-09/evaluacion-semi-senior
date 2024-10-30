<script lang="ts" setup>

definePageMeta({
  middleware: ['sanctum:auth'],
});

useState('activeItem', () => '');

</script>

<template>
  <h1>Loggeado con Éxito</h1>

  <slot/>
</template>

<style scoped>

</style>
