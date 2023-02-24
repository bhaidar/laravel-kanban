<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { PlusIcon } from '@heroicons/vue/24/solid';
import Column from '@/Components/Kanban/Column.vue';
</script>

<template>
    <Head>
        <title>Kanban Board</title>
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Board #1
            </h2>
        </template>

        <div class="flex-1 flex flex-col h-full overflow-hidden">
            <div class="flex-1 h-full overflow-x-auto">
                <div
                    class="inline-flex h-full items-start p-4 space-x-4 overflow-hidden">
                    <Column v-for="item in Array.from({ length: 2 })" />
                    <div class="w-72">
                        <button
                            class="flex items-center p-2 text-sm rounded-md font-medium bg-gray-200 text-gray-600 hover:text-black hover:bg-gray-300 w-full">
                            <PlusIcon class="w-5 h-5" />
                            <span class="ml-1">Add another list</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
