<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <section id="hero">
        <div class="relative min-h-[70vh] w-full overflow-hidden">
            <!-- Background Image -->
            <img src="https://images.pexels.com/photos/801863/pexels-photo-801863.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="tech fest background" class="absolute inset-0 w-full h-full object-cover opacity-70" id="img_hero">

            <!-- Overlay gradient -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/100 to-red-900/60 opacity-40">
            </div>

            <!-- Content -->
            <div class="relative min-h-[70vh] flex items-center justify-center">
                <div class="text-center space-y-10 px-4">
                    <div class="font-semibold lg:text-3xl text-xl animate-fade-in-down font-epilogue">
                        <p> 32 aniversario</p>
                        <span>Ingeniería de sistemas e informática</span>
                    </div>

                    <h1 class="text-6xl md:text-8xl font-bold text-white animate-fade-in-up float-animation font-russo">
                        System Fest
                    </h1>

                    <div
                        class="flex flex-wrap items-center justify-center gap-4 text-sm sm:text-base md:text-lg animate-fade-in-up">
                        <span
                            class="w-full sm:w-[220px] md:w-[220px] text-center bg-black/80 px-4 sm:px-6 py-3 rounded-3xl backdrop-blur-sm border border-red-500/40 hover:shadow-red-500/20 hover:shadow-xl">
                            Noviembre 29
                        </span>
                        <span
                            class="w-full sm:w-[220px] md:w-[220px] text-center bg-black/80 px-4 sm:px-6 py-3 rounded-3xl backdrop-blur-sm border border-red-500/40 hover:shadow-red-500/20 hover:shadow-xl">
                            Mistika casa club
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Generar tickets-->
        <div
            class="grid md:grid-cols-3 gap-8 pb-10 bg-red-900/25 backdrop-blur-sm p-10 xs:mx-2 rounded-3xl border border-white/30 hover:shadow-red-500/20 hover:shadow-xl mt-[-30px] 2xl:mt-[-100px]">
            <div class="items-center content-center">
                <h2 class="text-2xl font-bold mb-2 xs:text-center md:text-left">Genera tu ticket ahora</h2>
                <p>Para ingresar al evento, primero debes generar tu ticket digital como invitado o estudiante.
                </p>
            </div>
            <div class="group">
                <div class="py-8 px-6 rounded-xl bg-white backdrop-blur-sm text-center transition-all">
                    <h3 class="text-2xl font-bold text-black lg:text-base">Ticket invitado</h3>
                    <p class="py-3 min-h-20 text-black">Genera tu ticket digital como invitado</p>
                    <div class="flex justify-center">
                        <Link :href="$page.props.auth.user ? '/panel' : '/login'"
                            class="block w-full text-center px-4 py-2 rounded-lg bg-[#991B1BCC] text-white hover:bg-red-800 transition">
                        {{ $page.props.auth.user ? 'Ver' : 'Inscribete ya!' }}
                        </Link>
                    </div>
                </div>
            </div>
            <div class="group">
                <div class="py-8 px-6 rounded-xl bg-white backdrop-blur-sm text-center transition-all">
                    <h3 class="text-2xl font-bold text-black lg:text-base">Ticket estudiante</h3>
                    <p class="py-3 min-h-20 text-black">Genera tu ticket digital de ingreso</p>
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
