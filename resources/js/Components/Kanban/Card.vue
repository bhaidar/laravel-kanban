<script setup>
import { PencilIcon } from '@heroicons/vue/24/solid';
</script>

<template>
    <div
        class="relative group p-3 bg-white shadow rounded-md border border-b border-gray-300 hover:bg-gray-50">
        <a href="#" class="text-sm">this is a very
            important card, that we must address the
            soonest possible</a>
        <button
            class="hidden absolute right-1 top-1 w-8 h-8 bg-gray-50 text-gray-600 hover:text-black hover:bg-gray-200 rounded-md group-hover:grid place-content-center">
            <PencilIcon class="w-5 h-5" />
        </button>
    </div>
</template>
