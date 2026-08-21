<template>
  <span :class="['badge', `bg-${type}`, 'text-uppercase', 'rounded-pill']">
    <slot>{{ status }}</slot>
  </span>
</template>

<script setup>
defineProps({
  status: {
    type: String,
    required: true
  },
  type: {
    type: String,
    default: 'secondary', // success, danger, warning, info, primary, secondary
    validator(value) {
      return ['success', 'danger', 'warning', 'info', 'primary', 'secondary', 'dark', 'light'].includes(value)
    }
  }
});
</script>

<style scoped>
.badge {
  font-weight: 500;
  letter-spacing: 0.5px;
  padding: 0.35em 0.65em;
  font-size: 0.75em;
}
</style>
