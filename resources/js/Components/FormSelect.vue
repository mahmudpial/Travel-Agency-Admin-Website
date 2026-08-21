<template>
  <div class="mb-3">
    <label v-if="label" :for="id" class="form-label fw-semibold text-secondary">
      {{ label }}
      <span v-if="required" class="text-danger">*</span>
    </label>
    
    <select 
      :id="id"
      :class="['form-select', { 'is-invalid': error }]" 
      :value="modelValue" 
      @change="$emit('update:modelValue', $event.target.value)"
      :required="required"
      :disabled="disabled"
    >
      <option v-if="placeholder" value="" disabled selected>{{ placeholder }}</option>
      <option v-for="option in options" :key="option.value" :value="option.value">
        {{ option.label }}
      </option>
    </select>
    
    <div v-if="error" class="invalid-feedback">
      {{ error }}
    </div>
    
    <div v-if="helpText && !error" class="form-text">
      {{ helpText }}
    </div>
  </div>
</template>

<script setup>
defineProps({
  modelValue: {
    type: [String, Number],
    default: ''
  },
  options: {
    type: Array,
    required: true,
    // Expected format: [{ label: 'Active', value: 'active' }, ...]
  },
  label: {
    type: String,
    default: ''
  },
  id: {
    type: String,
    default: () => `select-${Math.random().toString(36).substring(2, 9)}`
  },
  placeholder: {
    type: String,
    default: 'Select an option'
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
