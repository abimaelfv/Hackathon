<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <section id="bases">
        <!-- Generar tickets-->
        <div
            class="grid md:grid-cols-2 gap-8 pb-10 bg-red-900/25 backdrop-blur-sm p-10 xs:mx-2 rounded-3xl border border-white/30 hover:shadow-red-500/20 hover:shadow-xl mt-[-30px] 2xl:mt-[-100px]">
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
                    <h3 class="text-2xl font-bold text-black lg:text-base">Hackaton 2024 UDH</h3>
                    <p class="py-3 min-h-14 text-black">¡Inscríbete ya y sé parte del cambio!</p>
                    <div class="flex justify-center">
                        <Link :href="$page.props.auth.user ? '/panel' : '/login'"
                            class="block w-full text-center px-4 py-2 rounded-lg bg-[#991B1BCC] text-white hover:bg-red-800 transition">
                        {{ $page.props.auth.user ? 'Ver' : 'Inscribete ya!' }}
                        </Link>
                    </div>
                </div>
            </div>
        </div>
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

#img_hero {
    mask-image: linear-gradient(to right, transparent, black 50%, transparent);
    -webkit-mask-image: linear-gradient(to right, transparent, black 80%, transparent);
}
</style>
