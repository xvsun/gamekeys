<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

let props = defineProps({
    game: Object,
});
</script>

<template>
    <AppLayout :title="'Game - ' + game.name">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ game.name }}
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                {{ game }}

            </div>
        </div>
    </AppLayout>
</template>
