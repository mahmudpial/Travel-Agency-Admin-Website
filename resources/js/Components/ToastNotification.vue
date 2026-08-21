<template>
  <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090">
    <div 
      v-for="toast in toasts" 
      :key="toast.id" 
      class="toast show align-items-center text-white border-0" 
      :class="[`bg-${toast.type}`]" 
      role="alert" 
      aria-live="assertive" 
      aria-atomic="true"
    >
      <div class="d-flex">
        <div class="toast-body">
          {{ toast.message }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" @click="removeToast(toast.id)" aria-label="Close"></button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const toasts = ref([]);
let toastId = 0;

// Helper to add toast and auto-remove after 5s
const addToast = (type, message) => {
  const id = toastId++;
  toasts.value.push({ id, type, message });
  
  setTimeout(() => {
    removeToast(id);
  }, 5000);
};

const removeToast = (id) => {
  toasts.value = toasts.value.filter(t => t.id !== id);
};

// Watch for flash messages from Inertia
watch(() => page.props.flash, (flash) => {
  if (flash.success) addToast('success', flash.success);
  if (flash.error) addToast('danger', flash.error);
  if (flash.warning) addToast('warning', flash.warning);
  if (flash.info) addToast('info', flash.info);
}, { deep: true, immediate: true });
</script>
