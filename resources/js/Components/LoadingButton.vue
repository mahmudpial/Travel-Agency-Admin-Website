<template>
  <button 
    :type="type" 
    :class="['btn', variantClass, sizeClass]"
    :disabled="disabled || loading"
  >
    <span v-if="loading" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
    <slot></slot>
  </button>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  type: {
    type: String,
    default: 'button' // could be 'submit', 'button', 'reset'
  },
  variant: {
    type: String,
    default: 'primary' // primary, secondary, success, danger, etc.
  },
  size: {
    type: String,
    default: '' // sm, lg
  },
  loading: {
    type: Boolean,
    default: false
  },
  disabled: {
    type: Boolean,
    default: false
  }
});

const variantClass = computed(() => `btn-${props.variant}`);
const sizeClass = computed(() => props.size ? `btn-${props.size}` : '');
</script>
