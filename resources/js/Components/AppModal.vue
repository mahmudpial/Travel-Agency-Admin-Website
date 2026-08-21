<script setup>
import { onMounted, onUnmounted, ref, watch } from 'vue'
import * as bootstrap from 'bootstrap'

const props = defineProps({
  id: {
    type: String,
    required: true
  },
  title: {
    type: String,
    default: 'Modal Title'
  },
  size: {
    type: String,
    default: 'md', // sm, md, lg, xl
    validator: (value) => ['sm', 'md', 'lg', 'xl'].includes(value)
  },
  show: {
    type: Boolean,
    default: false
  }
})

const emit = defineEmits(['update:show', 'closed'])
const modalRef = ref(null)
let bsModal = null

onMounted(() => {
  bsModal = new bootstrap.Modal(modalRef.value, {
    backdrop: 'static',
    keyboard: false
  })

  modalRef.value.addEventListener('hidden.bs.modal', () => {
    emit('update:show', false)
    emit('closed')
  })

  if (props.show) {
    bsModal.show()
  }
})

onUnmounted(() => {
  if (bsModal) {
    bsModal.dispose()
  }
})

watch(() => props.show, (newValue) => {
  if (newValue) {
    bsModal?.show()
  } else {
    bsModal?.hide()
  }
})
</script>

<template>
  <div class="modal fade" :id="id" tabindex="-1" :aria-labelledby="`${id}Label`" aria-hidden="true" ref="modalRef">
    <div :class="['modal-dialog', `modal-${size}`, 'modal-dialog-centered']">
      <div class="modal-content shadow-lg border-0">
        <div class="modal-header border-bottom-0 pb-0">
          <h5 class="modal-title fw-bold" :id="`${id}Label`">{{ title }}</h5>
          <button type="button" class="btn-close" @click="emit('update:show', false)" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <slot></slot>
        </div>
        <div class="modal-footer border-top-0 pt-0" v-if="$slots.footer">
          <slot name="footer"></slot>
        </div>
      </div>
    </div>
  </div>
</template>
