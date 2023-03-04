<script setup>
import { computed, nextTick, ref } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import { PencilIcon } from '@heroicons/vue/24/solid';
import { TrashIcon } from '@heroicons/vue/24/solid';
import { useEditCard } from '@/Composables/useEditCard';
import ConfirmDialog from '@/Components/Kanban/ConfirmDialog.vue';

const props = defineProps({
  card: Object,
});

// TODO: Move to composable useModal
const isOpen = ref(false);
const closeModal = confirm => {
  isOpen.value = false;
  if (confirm) {
    router.delete(
      route('columns.cards.destroy', {
        card: props?.card?.id,
        column: props?.card?.column,
      })
    );
  }
};
const openModal = () => (isOpen.value = true);

const form = useForm({
  content: props?.card?.content,
});

const inputCardContentRef = ref();
const isEditing = computed(
  () => props?.card?.id === useEditCard?.value?.currentCard
);

const cardContent = computed(() => props.card?.content);

const onSubmit = () => {
  form.put(
    route('columns.cards.update', {
      column: props?.card?.column,
      card: props?.card?.id,
    }),
    {
      onSuccess: () => {
        useEditCard.value.currentCard = null;
      },
    }
  );
};

const onCancel = () => {
  useEditCard.value.currentCard = null;
  form.reset();
};

const showForm = async () => {
  useEditCard.value.currentCard = props?.card?.id;
  await nextTick(); // wait for form to be rendered
  inputCardContentRef.value.focus();
};
</script>

<template>
  <div
    class="cursor-move relative group p-2 bg-white shadow rounded-md border border-b border-gray-300 hover:bg-gray-50"
  >
    <form v-if="isEditing" @keydown.esc="onCancel" @submit.prevent="onSubmit">
      <textarea
        v-model="form.content"
        type="text"
        @keydown.enter.prevent="onSubmit"
        placeholder="Card content ..."
        ref="inputCardContentRef"
        rows="3"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
      >
      </textarea>
      <div class="mt-2 space-x-2">
        <button
          type="submit"
          class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
          Save card
        </button>
        <button
          @click.prevent="onCancel"
          type="button"
          class="inline-flex items-center rounded-md border border-transparent px-4 py-2 text-sm font-medium text-gray-700 hover:text-black focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
          Cancel
        </button>
      </div>
    </form>
    <div v-else>
      <p class="text-sm">{{ cardContent }}</p>
      <div
        class="hidden absolute right-1 inset-0 group-hover:flex justify-end space-x-2 items-center"
      >
        <button
          @click.prevent="showForm"
          class="w-8 h-8 bg-gray-50 text-gray-600 hover:text-black hover:bg-gray-200 rounded-md grid place-content-center"
        >
          <PencilIcon class="w-5 h-5" />
        </button>
        <button
          @click.prevent="openModal"
          class="w-8 h-8 bg-gray-50 text-red-600 hover:text-red-700 hover:bg-gray-200 rounded-md grid place-content-center"
        >
          <TrashIcon class="w-5 h-5" />
        </button>
      </div>
    </div>
  </div>
  <ConfirmDialog
    :show="isOpen"
    @confirm="closeModal($event)"
    title="Remove Card"
    message="Are you sure you want to delete this card?"
  />
</template>
