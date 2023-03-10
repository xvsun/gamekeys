<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    keys: Object
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Library
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-for="key, key_key in keys" :key="key_key" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{ key.game.name }} {{ key.key }} 
                    <button @click="copyKey"> 
                       Copy
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>