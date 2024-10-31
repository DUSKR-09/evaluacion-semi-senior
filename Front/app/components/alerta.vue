<template>
  <div v-if="visible" :class="`alert ${type}`">
    <slot></slot>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
  type: {
    type: String,
    default: 'success' // o 'error'
  },
  duration: {
    type: Number,
    default: 3000
  }
});

const visible = ref(true);

const close = () => {
  visible.value = false;
};

if (props.duration) {
  setTimeout(close, props.duration);
}
</script>

<style>
.alert {
  padding: 10px;
  border-radius: 5px;
  margin-bottom: 10px;
}
.success {
  background-color: #d4edda;
  color: #155724;
}
.error {
  background-color: #f8d7da;
  color: #721c24;
}
</style>
