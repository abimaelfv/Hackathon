<script setup>
import CardAward from '@/Components/home/CardAward.vue'

</script>
<template>
    <section id="premios">
        <div class="py-10 xs:mx-2">
            <h1 class="text-center text-3xl font-semibold pb-10">[ Premios ]</h1>
            <div class="flex justify-center items-center content-center mb-10">
                <CardAward class="rotate-0 max-w-xl z-20 bg-blue-600/15 hover:shadow-blue-500/30"
                    label="Resolución de reconocimiento al equipo"
                    img="https://marketplace.canva.com/EAFQNGff-B8/1/0/1600w/canva-certificado-de-reconocimiento-simple-azul-y-amarillo-jVqupEcSv7g.jpg" />
            </div>
            <h2 class="text-center text-xl font-semibold mb-10 sm:mb-28">Incentivo económico</h2>
            <div class="flex justify-center items-center flex-col relative">
                <div class="sm:absolute sm:bottom-20">
                    <!-- Categoría B - Top 1 -->
                    <CardAward
                        class="order-1 sm:order-2 bg-blue-600/15 hover:shadow-blue-500/75 z-20 mx-auto sm:col-span-1 -rotate-2 -top-10"
                        label="Categoría B" img="/img/pinguinasenior.webp" money="400" currency="PEN" />
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 w-full sm:max-w-5xl">
                    <!-- Categoría C -->
                    <CardAward
                        class="order-3 sm:order-1 -rotate-6 bg-blue-600/15 hover:shadow-blue-500/30 mx-auto sm:col-span-1"
                        label="Categoría C" img="/img/pinguinobebe.webp" money="100" currency="PEN" />

                    <!-- Categoría A -->
                    <CardAward
                        class="order-2 sm:order-3 rotate-6 bg-blue-600/15 hover:shadow-blue-500/45 z-10 mx-auto sm:col-span-1"
                        label="Categoría A" img="/img/pinguinojoven.webp" money="300" currency="PEN" />
                </div>
            </div>
        </div>
    </section>
</template>