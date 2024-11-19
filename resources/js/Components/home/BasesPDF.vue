<script setup>
import { ref, onMounted, watch } from 'vue';
import { X } from 'lucide-vue-next';

defineProps({
    open: Boolean,
    close: Function
});

const showModal = ref(false);
const isMobile = ref(false);

const checkIfMobile = () => {
    isMobile.value = window.innerWidth <= 768;
};

onMounted(() => {
    checkIfMobile();
    window.addEventListener('resize', checkIfMobile);
});

watch(() => open, (newValue) => {
    showModal.value = newValue;
});

const downloadFile = () => {
    const link = document.createElement('a');
    link.href = '/pdf/Hackathon2024-Bases.pdf';
    link.download = 'Hackathon2024-Bases.pdf';
    link.target = '_blank';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};
</script>

<template>
    <div>
        <div
            v-if="!isMobile"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-md px-4 sm:px-6">
            <div
                class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-4 relative h-[90vh] sm:h-auto sm:max-h-[600px] overflow-hidden">
                <button @click="close" class="absolute top-4 right-4 text-[#991B1BCC] hover:text-red-800">
                    <X />
                </button>
                <h2 class="text-xl font-bold mb-4 text-center">Bases del Hackathon 2024</h2>
                <iframe
                    src="/pdf/Hackathon2024-Bases.pdf"
                    frameborder="0"
                    class="w-full h-full sm:h-[500px] rounded-lg border">
                </iframe>
            </div>
        </div>

        <div v-if="isMobile && showModal">
            {{ downloadFile() }}
        </div>
    </div>
</template>
