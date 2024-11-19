<script setup>
import CardAward from '@/Components/home/CardAward.vue'

</script>
<template>
    <section id="regalos">
        <div class="py-10 xs:mx-2">
            <h1 class="text-center text-3xl font-semibold pb-10">[ Premios ]</h1>
            <div class="flex justify-center items-center content-center mb-10">
                <CardAward class="rotate-0 max-w-xl z-20 bg-red-600/25 hover:shadow-red-500/30"
                    label="Resolución de reconocimiento al equipo"
                    img="https://marketplace.canva.com/EAFQNGff-B8/1/0/1600w/canva-certificado-de-reconocimiento-simple-azul-y-amarillo-jVqupEcSv7g.jpg" />
            </div>
            <h2 class="text-center text-xl font-semibold mb-10">Incentivo económico</h2>
            <div class="flex justify-center items-center content-center">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-1">
                    <!-- cards -->
                    <CardAward class="-rotate-12 bg-red-600/15 hover:shadow-red-500/10 z-10" label="Categoría A"
                        img="/img/pinguinobebe.webp" money="400" currency="PEN" />
                    <CardAward class="rotate-12 bg-red-600/5 hover:shadow-red-500/5" label="Categoría B"
                        img="/img/pinguinoadulto.webp" money="300" currency="PEN" />
                </div>
            </div>

        </div>
    </section>
</template>