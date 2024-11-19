<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { ArrowUp } from "lucide-vue-next";

const isVisible = ref(false);

const checkScroll = () => {
    isVisible.value = window.scrollY > 0;
};

const scrollToTop = () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
};

onMounted(() => {
    window.addEventListener("scroll", checkScroll);
});

onUnmounted(() => {
    window.removeEventListener("scroll", checkScroll);
});
</script>

<template>
    <div>
        <button v-if="isVisible" @click="scrollToTop"
            class="fixed bottom-4 right-4 bg-[#991B1BCC] text-white rounded-full p-4 transition-transform transform duration-700 hover:scale-110 sm:bottom-8 sm:right-8">
            <ArrowUp class="w-6 h-6" />
        </button>
    </div>
</template>

<style scoped>
/* No se requiere CSS adicional porque TailwindCSS maneja los estilos */
</style>
