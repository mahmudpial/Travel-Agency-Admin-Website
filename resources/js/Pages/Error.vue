<script setup>
import { computed } from 'vue'
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
  status: {
    type: Number,
    required: true
  }
})

const title = computed(() => {
  return {
    503: '503: Service Unavailable',
    500: '500: Server Error',
    404: '404: Page Not Found',
    403: '403: Forbidden',
  }[props.status] || 'Error'
})

const description = computed(() => {
  return {
    503: 'Sorry, we are doing some maintenance. Please check back soon.',
    500: 'Whoops, something went wrong on our servers.',
    404: 'Sorry, the page you are looking for could not be found.',
    403: 'Sorry, you are forbidden from accessing this page.',
  }[props.status] || 'An unexpected error occurred.'
})

const icon = computed(() => {
  return {
    503: 'bi-tools',
    500: 'bi-exclamation-triangle',
    404: 'bi-search',
    403: 'bi-shield-lock',
  }[props.status] || 'bi-bug'
})
</script>

<template>
  <Head :title="title" />
  <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center bg-light text-center p-4">
    <div class="mb-4">
      <i :class="['bi', icon, 'text-primary', 'opacity-50']" style="font-size: 5rem;"></i>
    </div>
    
    <h1 class="display-5 fw-bold text-dark mb-3">{{ title }}</h1>
    
    <p class="lead text-muted mb-5 max-w-md mx-auto" style="max-width: 500px;">
      {{ description }}
    </p>
    
    <Link :href="route('dashboard')" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">
      <i class="bi bi-house-door me-2"></i> Return to Dashboard
    </Link>
  </div>
</template>
