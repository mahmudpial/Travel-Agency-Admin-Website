<template>
  <div class="text-center py-5">
    <div class="mb-3">
      <i :class="['bi', icon, 'text-secondary', 'opacity-25']" style="font-size: 4rem;"></i>
    </div>
    <h5 class="fw-bold text-dark">{{ title }}</h5>
    <p class="text-muted mx-auto" style="max-width: 400px;">{{ description }}</p>
    <div class="mt-4" v-if="$slots.default">
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
defineProps({
  title: {
    type: String,
    default: 'No Data Found'
  },
  description: {
    type: String,
    default: 'There is currently no data available to display here.'
  },
  icon: {
    type: String,
    default: 'bi-inbox'
  }
});
</script>
