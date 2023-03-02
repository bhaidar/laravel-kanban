<script setup>
import Dialog from '@/Components/Kanban/Dialog.vue';

const props = defineProps({
  confirmLabel: String,
  cancelLabel: String,
  message: String,
  show: Boolean,
  title: String,
});

const emit = defineEmits(['confirm']);
</script>

<template>
  <Dialog :show="show" @close="emit('confirm', false)">
    <p class="text-sm text-red-500">
      {{ message }}
    </p>
    <template #title>
      {{ title }}
    </template>
    <template #actions>
      <div class="w-full flex justify-end space-x-4">
        <button
          type="button"
          class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
          @click="emit('confirm', true)"
        >
          {{ confirmLabel ?? 'Confirm' }}
        </button>
        <button
          type="button"
          @click="emit('confirm', false)"
          class="inline-flex items-center rounded-md border border-transparent px-4 py-2 text-sm font-medium text-gray-700 hover:text-black focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
        >
          {{ cancelLabel ?? 'Cancel' }}
        </button>
      </div>
    </template>
  </Dialog>
</template>
