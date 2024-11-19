<script setup>
import { ref } from "vue";
import { ChevronRight, Package } from "lucide-vue-next";

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
        title: "Paquete local",
        description: `Mistika Casa Club, ubicado en el Jr. La Estancia S/N, Urb. Santa María del Huallaga, proporcionará:
            - Mesas con manteles 
            - Sillas con lazos
            - Seguridad
            - Limpieza
            - Mozos
        `,
        hour: "",
    },
    {
        title: "Paquete de comida",
        description: "Consistirá de un plato gourmet en base a pollo + gaseosa inca kola de 600 mL",
        hour: "",
    },
    {
        title: "Paquete barra libre",
        description: `Incluye una selección de bebidas alcohólicas y no alcohólicas ilimitadas durante 3 horas
            - Bebidas alcohólicas: cócteles y licores.
            - Bebidas  no alcohólicas: gaseosas y refrescos.
            - Personal capacitado para servir las bebidas.
        `,
        hour: "",
    },
    {
        title: "Paquete orquesta",
        description: `Disfruta de la orquesta: Mirko Viera.
            - Actuación en vivo de la orquesta durante 5 horas.
            - Amplia variedad de repertorio musical: salsa, rock, baladas y más.
        `,
        hour: "",
    },
    {
        title: "Paquete banda",
        description: `Disfruta de la banda:
            - Actuación en vivo de la banda durante 1 hora.
            - Estilo musical variado.
        `,
        hour: "",
    },
].map((item) => ({
    ...item,
    parsedDescription: parseDescription(item.description),
}));
</script>

<template>
    <section id="paquetes">
        <div class="py-20 xs:mx-2">
            <h1 class="text-center text-3xl font-semibold py-10">[ Paquetes ]</h1>
            <div class="space-y-4 max-w-4xl mx-auto">
                <template v-for="(item, index) in items" :key="index">
                    <div
                        class="bg-black/30 backdrop-blur-sm rounded-xl overflow-hidden border-[1px] border-white/25 transform transition-transform duration-500 ease-in-out">
                        <div @click="toggleAccordion(index)"
                            :class="['p-4 font-bold text-xl cursor-pointer hover:bg-red-100/10 transition-colors flex items-center justify-between text-center', isOpen[index] ? 'bg-gradient-to-l from-black/70 to-red-900/60' : '']">
                            <div class="flex items-center gap-2">
                                <Package class="w-5" />
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