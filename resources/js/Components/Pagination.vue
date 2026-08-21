<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  links: {
    type: Array,
    required: true,
  }
})
</script>

<template>
  <nav v-if="links.length > 3" aria-label="Page navigation" class="mt-4">
    <ul class="pagination justify-content-center justify-content-md-end mb-0">
      <template v-for="(link, key) in links" :key="key">
        <li class="page-item" :class="{ 'active': link.active, 'disabled': link.url === null }">
          <Link
            v-if="link.url"
            class="page-link shadow-sm rounded-1 mx-1"
            :class="{ 'bg-primary text-white border-primary': link.active, 'text-dark': !link.active }"
            :href="link.url"
            v-html="link.label"
          />
          <span 
            v-else 
            class="page-link text-muted shadow-sm rounded-1 mx-1 border-0 bg-light" 
            v-html="link.label"
          ></span>
        </li>
      </template>
    </ul>
  </nav>
</template>
