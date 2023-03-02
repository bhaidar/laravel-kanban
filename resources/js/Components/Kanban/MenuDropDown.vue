<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { EllipsisHorizontalIcon } from '@heroicons/vue/24/solid';

const props = defineProps({
  menuItems: {
    type: Array,
    default: () => [],
  },
});
</script>

<template>
  <Menu as="div" class="relative z-50">
    <MenuButton
      class="hover:bg-gray-300 rounded-md w-8 h-8 grid place-items-center"
    >
      <EllipsisHorizontalIcon class="h-5 w-5" />
    </MenuButton>
    <transition
      enter-active-class="transition transform duration-100 ease-out"
      enter-from-class="opacity-0 scale-90"
      enter-to-class="opacity-100 scale-100"
      leave-active-class="transition transform duration-100 ease-in"
      leave-from-class="opacity-100 scale-100"
      leave-to-class="opacity-0 scale-90"
    >
      <MenuItems
        class="origin-top-left mt-2 focus:outline-none absolute left-0 bg-white overflow-hidden rounded-md shadow-lg border w-48"
      >
        <MenuItem v-for="menu in menuItems" v-slot="{ active }">
          <a
            href="#"
            @click="$event => menu.action()"
            :class="{ 'bg-gray-100': active }"
            class="block px-4 py-2 text-sm text-gray-700"
            >{{ menu.name }}</a
          >
        </MenuItem>
      </MenuItems>
    </transition>
  </Menu>
</template>
