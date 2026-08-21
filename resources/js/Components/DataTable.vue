<template>
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light text-muted">
        <tr>
          <th v-for="col in columns" :key="col.key" scope="col" class="fw-semibold text-uppercase" style="font-size: 0.85rem;">
            {{ col.label }}
          </th>
        </tr>
      </thead>
      <tbody>
        <template v-if="items && items.length > 0">
          <tr v-for="(item, index) in items" :key="item.id || index">
            <!-- Default row rendering using dynamic keys if no scoped slot is provided, otherwise use the slot -->
            <slot name="row" :item="item" :index="index">
              <td v-for="col in columns" :key="col.key">
                {{ item[col.key] }}
              </td>
            </slot>
          </tr>
        </template>
        <tr v-else>
          <td :colspan="columns.length" class="p-0 border-bottom-0">
            <EmptyState 
              :title="emptyTitle" 
              :description="emptyDescription" 
              :icon="emptyIcon" 
            />
          </td>
        </tr>
      </tbody>
    </table>
    
    <!-- Optional Pagination Slot -->
    <div v-if="$slots.pagination" class="mt-4 d-flex justify-content-between align-items-center">
      <slot name="pagination"></slot>
    </div>
  </div>
</template>

<script setup>
import EmptyState from './EmptyState.vue';

defineProps({
  columns: {
    type: Array,
    required: true,
    // Example: [{ key: 'name', label: 'Customer Name' }, { key: 'status', label: 'Status' }]
  },
  items: {
    type: Array,
    default: () => []
  },
  emptyTitle: {
    type: String,
    default: 'No Records Found'
  },
  emptyDescription: {
    type: String,
    default: 'There are no records available to display in this table.'
  },
  emptyIcon: {
    type: String,
    default: 'bi-folder-x'
  }
});
</script>
