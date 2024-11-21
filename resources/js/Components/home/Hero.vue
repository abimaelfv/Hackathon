<script setup>
import { ref, onMounted } from 'vue';
import BasesPDF from './BasesPDF.vue';

const showModal = ref(false);
const appUrl = import.meta.env.VITE_APP_URL;
const isMobile = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const checkIfMobile = () => {
    isMobile.value = window.innerWidth <= 768;
};

onMounted(() => {
    checkIfMobile();
    window.addEventListener('resize', checkIfMobile);
});

</script>

<template>
    <section id="bases">
        <div
            class="grid md:grid-cols-2 gap-8 bg-blue-900/25 backdrop-blur-sm p-10 xs:mx-2 rounded-3xl border border-white/30 hover:shadow-blue-500/20 hover:shadow-xl mt-[-30px] 2xl:mt-[-100px] mx-2">
            <div class="items-center content-center">
                <h2 class="text-2xl font-bold mb-2 xs:text-center md:text-left">OBJETIVO</h2>
                <p class="text-sm italic">
                    Fomentar la innovación tecnológica y el trabajo colaborativo entre estudiantes de Ingeniería de
                    Sistemas, desarrollando soluciones creativas para problemas reales de instituciones públicas,
                    fortaleciendo la gestión pública e impactando positivamente en la sociedad.
                </p>
            </div>
            <div class="group">
                <div class="py-8 px-6 rounded-xl bg-white backdrop-blur-sm text-center transition-all">
                    <h3 class="text-2xl font-bold text-black lg:text-xl">Hackathon 2024 UDH</h3>
                    <p class="py-3 min-h-14 text-black font-medium">¡Postula ya y sé parte del cambio!</p>
                    <div class="flex justify-center">
                        <button @click="openModal" v-if="!isMobile"
                            class="block w-full text-center px-4 py-2 rounded-lg bg-[#113475da] text-white hover:bg-blue-800 transition">
                            Ver bases
                        </button>
                        <a v-if="isMobile" :href="`${appUrl}/pdf/Hackathon2024-Bases.pdf`"
                            download="Hackathon2024-Bases.pdf"
                            class="block w-full text-center px-4 py-2 rounded-lg bg-[#113475cc] text-white hover:bg-blue-800 transition">
                            Ver bases
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <BasesPDF v-if="showModal" :open="showModal" :close="closeModal" />
    </section>
</template>

<style scoped>
@keyframes float {
    0% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(-10px);
    }

    100% {
        transform: translateY(0px);
    }
}

.float-animation {
    animation: float 6s ease-in-out infinite;
}

.modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
    z-index: 50;
}
</style>
