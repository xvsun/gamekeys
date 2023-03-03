<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from "@inertiajs/vue3";

let props = defineProps({
    game: Object,
});

let claimKey = ((id) => {
    router.post(route('keys.claim', id));
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

                <img :src="game.image_url" alt="">

                <div class="">
                    Keys

                    <div class="grid grid-cols-1">
                        <div v-for="key, key_key in game.keys" :key="key_key" class="flex flex-row justify-between">
                            <span>{{ game.name }}</span>
                            <span>{{ key.platform.name }}</span>
                            <button @click="claimKey(key.id)">Claim</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AppLayout>
</template>
