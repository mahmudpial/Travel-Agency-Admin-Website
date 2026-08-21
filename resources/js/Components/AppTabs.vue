<script setup>
import { ref } from 'vue'

const props = defineProps({
  tabs: {
    type: Array,
    required: true,
    // Expected format: [{ id: 'tab1', label: 'Tab 1', icon: 'bi-person' }, ...]
  },
  initialTab: {
    type: String,
    default: ''
  }
})

const activeTab = ref(props.initialTab || (props.tabs.length > 0 ? props.tabs[0].id : ''))

const emit = defineEmits(['update:activeTab'])

const setActiveTab = (tabId) => {
  activeTab.value = tabId
  emit('update:activeTab', tabId)
}
</script>

<template>
  <div>
    <!-- Tab Navigation -->
    <ul class="nav nav-tabs border-bottom-0 mb-3" role="tablist">
      <li class="nav-item" role="presentation" v-for="tab in tabs" :key="tab.id">
        <button 
          class="nav-link fw-medium px-4 py-3 border-0 rounded-top"
          :class="{ 'active text-primary bg-white border-bottom-0 shadow-sm': activeTab === tab.id, 'text-muted': activeTab !== tab.id }"
          @click="setActiveTab(tab.id)"
          :id="`tab-${tab.id}`"
          type="button"
          role="tab"
          :aria-controls="`tabpanel-${tab.id}`"
          :aria-selected="activeTab === tab.id"
          style="transition: all 0.2s ease;"
        >
          <i v-if="tab.icon" :class="['bi', tab.icon, 'me-2']"></i>
          {{ tab.label }}
        </button>
      </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content bg-white p-4 rounded-3 shadow-sm border">
      <div 
        v-for="tab in tabs" 
        :key="tab.id"
        class="tab-pane fade"
        :class="{ 'show active': activeTab === tab.id }"
        :id="`tabpanel-${tab.id}`"
        role="tabpanel"
        :aria-labelledby="`tab-${tab.id}`"
      >
        <slot :name="tab.id"></slot>
      </div>
    </div>
  </div>
</template>

<style scoped>
.nav-tabs .nav-link:hover:not(.active) {
  background-color: #f8f9fa;
  color: #495057;
}
.nav-tabs .nav-link.active {
  position: relative;
}
.nav-tabs .nav-link.active::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 3px;
  background-color: var(--bs-primary);
  border-radius: 3px 3px 0 0;
}
</style>
