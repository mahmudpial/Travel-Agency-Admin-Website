<template>
  <div class="mb-3">
    <label v-if="label" :for="id" class="form-label fw-semibold text-secondary">
      {{ label }}
      <span v-if="required" class="text-danger">*</span>
    </label>
    
    <div class="input-group">
      <input 
        type="file" 
        :id="id"
        :class="['form-control', { 'is-invalid': error }]" 
        @change="handleFileChange"
        :accept="accept"
        :required="required"
        :disabled="disabled"
      />
      <button 
        v-if="selectedFileName" 
        class="btn btn-outline-secondary" 
        type="button" 
        @click="clearFile"
        :disabled="disabled"
      >
        <i class="bi bi-x-circle"></i> Clear
      </button>
    </div>
    
    <div v-if="error" class="invalid-feedback d-block">
      {{ error }}
    </div>
    
    <div v-if="helpText && !error" class="form-text">
      {{ helpText }}
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
  label: {
    type: String,
    default: ''
  },
  id: {
    type: String,
    default: () => `file-${Math.random().toString(36).substring(2, 9)}`
  },
  accept: {
    type: String,
    default: '' // e.g., 'image/*,.pdf'
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

const emit = defineEmits(['update:modelValue']);
const selectedFileName = ref('');

const handleFileChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    selectedFileName.value = file.name;
    emit('update:modelValue', file);
  } else {
    clearFile();
  }
};

const clearFile = () => {
  const input = document.getElementById(props.id);
  if (input) input.value = '';
  selectedFileName.value = '';
  emit('update:modelValue', null);
};
</script>
