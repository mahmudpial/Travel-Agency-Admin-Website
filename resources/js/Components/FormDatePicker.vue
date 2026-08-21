<script setup>
import { onMounted, onUnmounted, ref, watch } from 'vue'
import flatpickr from 'flatpickr'
import 'flatpickr/dist/flatpickr.min.css'

const props = defineProps({
  modelValue: {
    type: [String, Date],
    default: ''
  },
  id: {
    type: String,
    required: true
  },
  label: {
    type: String,
    required: true
  },
  placeholder: {
    type: String,
    default: 'Select date'
  },
  error: {
    type: String,
    default: ''
  },
  config: {
    type: Object,
    default: () => ({})
  },
  required: {
    type: Boolean,
    default: false
  }
})

const emit = defineEmits(['update:modelValue'])
const inputRef = ref(null)
let fp = null

onMounted(() => {
  fp = flatpickr(inputRef.value, {
    defaultDate: props.modelValue,
    dateFormat: 'Y-m-d',
    onChange: (selectedDates, dateStr) => {
      emit('update:modelValue', dateStr)
    },
    ...props.config
  })
})

onUnmounted(() => {
  if (fp) {
    fp.destroy()
  }
})

watch(() => props.modelValue, (newValue) => {
  if (fp && newValue !== inputRef.value.value) {
    fp.setDate(newValue, false)
  }
})
</script>

<template>
  <div class="mb-3">
    <label v-if="label" :for="id" class="form-label fw-medium text-secondary">
      {{ label }} <span v-if="required" class="text-danger">*</span>
    </label>
    
    <div class="input-group">
      <span class="input-group-text bg-light border-end-0 text-muted">
        <i class="bi bi-calendar3"></i>
      </span>
      <input 
        :id="id"
        ref="inputRef"
        type="text"
        class="form-control bg-light border-start-0 ps-0" 
        :class="{ 'is-invalid': error }"
        :placeholder="placeholder"
        :required="required"
      >
    </div>
    
    <div v-if="error" class="invalid-feedback d-block mt-1">
      <i class="bi bi-exclamation-circle me-1"></i> {{ error }}
    </div>
  </div>
</template>

<style>
/* Customizing flatpickr for Bootstrap feel */
.flatpickr-calendar {
  border: 1px solid #dee2e6;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  border-radius: 0.5rem;
}
</style>
