<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <section id="inicio">
        <div class="relative min-h-[70vh] w-full overflow-hidden">
            <!-- Background Image -->
            <img src="https://img.freepik.com/premium-photo/financial-hackathon-event-where-teams-compete-develop-innovative-fintech-solutions_1007506-49068.jpg"
                alt="tech fest background" class="absolute inset-0 w-full h-full object-cover opacity-70" id="img_hero">

            <!-- Overlay gradient -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/100 to-blue-900/60 opacity-40">
            </div>

            <!-- Content -->
            <div class="relative min-h-[70vh] flex items-center justify-center">
                <div class="text-center space-y-10 px-4">
                    <div class="font-bold lg:text-2xl text-xl animate-fade-in-down font-epilogue">
                        <p>32 aniversario</p>
                        <span>Ingeniería de sistemas e informática</span>
                    </div>

                    <h1
                        class="text-6xl md:text-8xl font-bold text-white animate-fade-in-up float-animation font-dameron">
                        Hackathon
                    </h1>

                    <div class="flex justify-end items-center content-center flex-col font-semibold">
                        <Link :href="$page.props.auth.user ? '/panel' : '/login'" class="relative w-60 sm:w-[220px] md:w-[220px] text-center 
        overflow-hidden 
        transition-all duration-900 ease-in-out 
        text-white
        font-semibold
        border-2 border-[#3763a7] 
        bg-gradient-to-r 
        from-[rgba(27,80,253,0.41)] 
        via-transparent 
        to-[rgba(27,151,253,0.3)] 
        px-4 sm:px-6 
        py-3 
        rounded-xl 
        hover:text-white
        hover:shadow-inset_0_0_10px_rgba(55,99,167,0.7),0_0_9px_3px_rgba(55,99,167,0.8)]
        shadow-[inset_0_0_10px_rgba(55,99,167,0.6),0_0_9px_3px_rgba(55,99,167,0.8)]
        tracking-wider
        group
        transform hover:scale-105
      ">
                        {{ $page.props.auth.user ? 'Ir al panel' : '¡ Postula ya !' }}
                        <span class="absolute left-[-4em] top-0 h-full w-[4em] transition-transform duration-900 
          bg-gradient-to-r 
          from-transparent 
          via-[rgba(27,200,255,0.5)] 
          to-transparent 
          group-hover:translate-x-[15em]"></span>
                        </Link>
                    </div>
                    <!-- inset_0_0_10px_rgba(55,99,167,0.4),0_0_9px_3px_rgba(55,99,167,0.1)] -->
                    <!-- shadow-[inset_0_0_10px_rgba(55,99,167,0.6),0_0_9px_3px_rgba(55,99,167,0.2)] -->
                    <div
                        class="flex flex-wrap items-center justify-center gap-4 text-sm sm:text-base md:text-lg animate-fade-in-up font-semibold">
                        <span class="w-autotext-center bg-blue-200/5 rounded-lg px-4 sm:px-3 py-2  backdrop-blur-sm">
                            Noviembre 26
                        </span>
                        <span class="w-autotext-center bg-blue-200/5 rounded-lg px-4 sm:px-3 py-2  backdrop-blur-sm">
                            08:00 AM - 02:00 PM
                        </span>
                        <span class="w-autotext-center bg-blue-200/5 rounded-lg px-4 sm:px-3 py-2  backdrop-blur-sm">
                            Biblioteca UDH
                        </span>
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
