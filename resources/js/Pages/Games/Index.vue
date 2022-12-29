<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps(['games']);
</script>

<template>
    <AppLayout title="Games">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Games
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> -->
                <!-- Code -->

                <div class="grid grid-cols-1 sm:grid-cols-3 px-2 sm:p-0 gap-4">
                    <div v-for="game, game_key in games" :key="game_key"
                        class="bg-white rounded-lg shadow-lg overflow-hidden space-y-2">
                        <div class="w-100 h-100 relative">
                            <img v-bind:src="game.image_url" alt="">
                            <div
                                class="absolute top-0 left-0 m-2 bg-purple-300 w-8 h-8 rounded-full text-center align-middle">
                                <div class="flex w-full h-full items-center justify-center">
                                    <span class="font-medium text-lg"> {{ game.key_amount }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-2 pb-2 flex flex-row justify-between">
                            <h3 class="font-medium text-2xl leading-tight">{{ game.name }}</h3>
                            <!-- TODO logos ziehen <div v-for="platform, platform_key in game.key_platforms">{{ platform }}</div> -->
                            <div class="flex flex-row space-x-1">
                                <!-- Platform logos -->
                                <svg class="w-6" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 496 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path
                                        d="M496 256c0 137-111.2 248-248.4 248-113.8 0-209.6-76.3-239-180.4l95.2 39.3c6.4 32.1 34.9 56.4 68.9 56.4 39.2 0 71.9-32.4 70.2-73.5l84.5-60.2c52.1 1.3 95.8-40.9 95.8-93.5 0-51.6-42-93.5-93.7-93.5s-93.7 42-93.7 93.5v1.2L176.6 279c-15.5-.9-30.7 3.4-43.5 12.1L0 236.1C10.2 108.4 117.1 8 247.6 8 384.8 8 496 119 496 256zM155.7 384.3l-30.5-12.6a52.79 52.79 0 0 0 27.2 25.8c26.9 11.2 57.8-1.6 69-28.4 5.4-13 5.5-27.3.1-40.3-5.4-13-15.5-23.2-28.5-28.6-12.9-5.4-26.7-5.2-38.9-.6l31.5 13c19.8 8.2 29.2 30.9 20.9 50.7-8.3 19.9-31 29.2-50.8 21zm173.8-129.9c-34.4 0-62.4-28-62.4-62.3s28-62.3 62.4-62.3 62.4 28 62.4 62.3-27.9 62.3-62.4 62.3zm.1-15.6c25.9 0 46.9-21 46.9-46.8 0-25.9-21-46.8-46.9-46.8s-46.9 21-46.9 46.8c.1 25.8 21.1 46.8 46.9 46.8z" />
                                </svg>
                                <svg class="w-6" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path
                                        d="M256 48C141.1 48 48 141.1 48 256v40c0 13.3-10.7 24-24 24s-24-10.7-24-24V256C0 114.6 114.6 0 256 0S512 114.6 512 256V400.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24H240c-26.5 0-48-21.5-48-48s21.5-48 48-48h32c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40V256c0-114.9-93.1-208-208-208zM144 208h16c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H144c-35.3 0-64-28.7-64-64V272c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64v48c0 35.3-28.7 64-64 64H352c-17.7 0-32-14.3-32-32V240c0-17.7 14.3-32 32-32h16z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- </div> -->
            </div>
        </div>
    </AppLayout>
</template>
