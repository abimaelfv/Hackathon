<script setup>
import { ref } from "vue";
import { ChevronRight, ChartBarStacked } from "lucide-vue-next";

const abiertoPaquete = 0;
const isOpen = ref(Array(5).fill(false));
isOpen.value[abiertoPaquete] = true;

const toggleAccordion = (index) => {
    isOpen.value[index] = !isOpen.value[index];
};

const parseDescription = (description) => {
    const lines = description.split("\n").map(line => line.trim());
    const mainDescription = lines.filter(line => !line.startsWith("-"));
    const subDescription = lines.filter(line => line.startsWith("-"));
    return { mainDescription, subDescription };
};

const items = [
    {
        title: "Categoría A",
        description: `Primer puesto se le dará:
            - S/ 300.00
            - Resolución de reconocimiento al equipo
        `,
    },
    {
        title: "Categoría B",
        description: `Primer puesto se le dará
            - S/ 400.00
            - Resolución de reconocimiento al equipo
        `,
    },
].map((item) => ({
    ...item,
    parsedDescription: parseDescription(item.description),
}));
</script>

<template>
    <section id="premios">
        <div class="py-20 xs:mx-2">
            <h1 class="text-center text-3xl font-semibold py-5">[ Premios ]</h1>
            <h3 class="text-center font-semibold pt-5 pb-5">Premiación Viernes 29-Nov</h3>
            <div class="space-y-4 max-w-4xl mx-auto">
                <template v-for="(item, index) in items" :key="index">
                    <div
                        class="bg-black/30 backdrop-blur-sm rounded-xl overflow-hidden border-[1px] border-white/25 transform transition-transform duration-500 ease-in-out">
                        <div @click="toggleAccordion(index)"
                            :class="['p-4 font-bold text-xl cursor-pointer hover:bg-red-100/10 transition-colors flex items-center justify-between text-center', isOpen[index] ? 'bg-gradient-to-l from-black/70 to-red-900/60' : '']">
                            <div class="flex items-center gap-2">
                                <ChartBarStacked class="w-5" />
                                <span class="mt-1">
                                    {{ item.title }}
                                </span>
                            </div>

                            <div class="flex gap-2 items-center">
                                {{ item.hour }}
                                <span class="transform transition-transform duration-400 ease-in-out"
                                    :class="{ 'rotate-90': isOpen[index] }">
                                    <ChevronRight />
                                </span>
                            </div>
                        </div>
                        <div v-show="isOpen[index]" class="p-4 text-gray-300 border-t border-red-900/30">
                            <p v-for="line in item.parsedDescription.mainDescription" :key="line">
                                {{ line }}
                            </p>
                            <ul class="mt-2 pl-4 list-disc">
                                <li v-for="line in item.parsedDescription.subDescription" :key="line">
                                    {{ line.slice(1).trim() }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</template>
