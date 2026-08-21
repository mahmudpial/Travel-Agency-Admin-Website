<template>
  <div class="mb-3">
    <label v-if="label" :for="id" class="form-label fw-semibold text-secondary">
      {{ label }}
      <span v-if="required" class="text-danger">*</span>
    </label>
    
    <input 
      :id="id"
      :type="type" 
      :class="['form-control', { 'is-invalid': error }]" 
      :value="modelValue" 
      @input="$emit('update:modelValue', $event.target.value)"
      :placeholder="placeholder"
      :required="required"
      :disabled="disabled"
    />
    
    <div v-if="error" class="invalid-feedback">
      {{ error }}
    </div>
    
    <div v-if="helpText && !error" class="form-text">
      {{ helpText }}
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  modelValue: {
    type: [String, Number],
    default: ''
  },
  label: {
    type: String,
    default: ''
  },
  type: {
    type: String,
    default: 'text'
  },
  id: {
    type: String,
    default: () => `input-${Math.random().toString(36).substring(2, 9)}`
  },
  placeholder: {
    type: String,
    default: ''
  },
  error: {
    type: String,
    default: ''
  },
  required: {
    type: Boolean,
    default: false
  },
  disabled: {
    type: Boolean,
    default: false
  },
  helpText: {
    type: String,
    default: ''
  }
});

defineEmits(['update:modelValue']);
</script>
