<script setup>
import { EllipsisHorizontalIcon, PlusIcon } from '@heroicons/vue/24/solid';
import Card from '@/Components/Kanban/Card.vue';
</script>

<template>
    <div class="w-72 max-h-full bg-gray-200 flex flex-col rounded-md">
        <div class="flex items-center justify-between px-3 py-2">
            <h3 class="font-semibold text-sm text-gray-700">Backlog
            </h3>
            <button
                class="hover:bg-gray-300 rounded-md w-8 h-8 grid place-items-center">
                <EllipsisHorizontalIcon class="h-5 w-5" />
            </button>
        </div>
        <div class="pb-3 flex-1 flex flex-col overflow-hidden">
            <div class="px-3 overflow-y-auto">
                <ul class="space-y-3">
                    <li v-for="item in Array.from({ length: 12 })">
                        <Card />
                    </li>
                </ul>
            </div>
            <div class="px-3 mt-3">
                <button
                    class="flex items-center p-2 text-sm rounded-md font-medium text-gray-600 hover:text-black hover:bg-gray-300 w-full">
                    <PlusIcon class="h-5 w-5"></PlusIcon>
                    <span class="ml-1">Add card</span>
                </button>
            </div>
        </div>
    </div>
</template>
