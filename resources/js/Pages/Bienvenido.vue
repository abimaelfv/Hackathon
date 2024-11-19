<script setup>
import { Head } from '@inertiajs/vue3'
import Navbar from '../Components/home/Navbar.vue'
import Inicio from '@/Components/home/Inicio.vue'
import Hero from '../Components/home/Hero.vue'
import Package from '../Components/home/Package.vue'
import Foot from '../Components/home/Foot.vue'
import ButtonToTop from '../Components/home/ButtonToTop.vue'
import Location from '@/Components/home/Location.vue'
</script>

<template>

    <Head title="Inicio" />
    <div
        class="min-h-screen bg-gradient-to-br bg-black to-red-900 text-white px-0 2xl:px-96 xl:px-60 lg:px-62 md:px-52 font-epilogue">
        <header id="inicio">
            <Navbar />
        </header>

        <main class="pt-20">
            <!-- Inicio -->
            <Inicio />

            <!-- Hero -->
            <Hero />

            <!-- Agenda -->
            <Package />

            <!-- Ubicacion -->
            <Location />
        </main>

        <ButtonToTop />

        <Foot />
    </div>
</template>

<style scoped>
@keyframes fade-in-down {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }

    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-in-up {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }

    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-down {
    animation: fade-in-down 1s ease-out forwards;
}

.animate-fade-in-up {
    animation: fade-in-up 1s ease-out forwards;
}
</style>
