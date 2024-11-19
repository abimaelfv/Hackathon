<script setup>
import { Head } from '@inertiajs/vue3';
import WebLayout from '@/Layouts/WebLayout.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>

    <Head title="Welcome" />

    <WebLayout>
        <div class="flex pb-6 flex-wrap items-center">
            <div class="w-full lg:w-12/12 text-center">
                <div class="pt-20 pb-24">
                    <h1
                        class="mb-5 text-4xl font-bold !leading-[1.208] text-udh_3 sm:text-[42px] lg:text-[40px] xl:text-5xl dark:text-white">
                        <b class="text-udh_1">Hackathon UDH 2024</b><br>
                        Sistem Fest
                    </h1>
                    <p class="mb-8 text-base text-body-color dark:text-dark-6">
                        ¡Inscríbete ya y sé parte del cambio!
                    </p>
                    <ul class="flex flex-wrap items-center justify-center">
                        <li>
                            <a :href="route('panel')"
                                class="inline-flex items-center justify-center rounded-md bg-udh_1 px-6 py-3 text-center text-base font-medium text-white hover:translate-x-6 transition-transform duration-300 ease-in-out lg:px-7">
                                Inscríbete ya
                                <i class="ml-4 fa-solid fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </WebLayout>
</template>
