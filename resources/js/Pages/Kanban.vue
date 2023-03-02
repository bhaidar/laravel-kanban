<script setup>
import { computed, ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import Column from '@/Components/Kanban/Column.vue';
import ColumnCreate from '@/Components/Kanban/ColumnCreate.vue';

const props = defineProps({
  board: Object,
});

const columns = computed(() => props.board?.data?.columns);
const boardTitle = computed(() => props.board?.data?.title);

const columnsWithOrder = ref([]);

const onReorderChange = column => {
  columnsWithOrder.value?.push(column);
};

const onReorderCommit = () => {
  if (!columnsWithOrder?.value?.length) {
    return;
  }

  router.put(route('cards.reorder'), {
    columns: columnsWithOrder.value,
  });
};
</script>

<template>
  <Head>
    <title>Kanban Board</title>
  </Head>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-black text-2xl text-gray-800 leading-tight">
        {{ boardTitle }}
      </h2>
    </template>

    <div class="flex-1 flex flex-col h-full overflow-hidden">
      <div class="flex-1 h-full overflow-x-auto">
        <div
          class="inline-flex h-full items-start p-4 space-x-4 overflow-hidden"
        >
          <Column
            v-for="column in columns"
            :key="column.title"
            :column="column"
            @reorder-change="onReorderChange"
            @reorder-commit="onReorderCommit"
          />
          <div class="w-72">
            <ColumnCreate :board="board.data" />
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
