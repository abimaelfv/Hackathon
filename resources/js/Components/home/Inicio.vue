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
                    <div class="font-semibold lg:text-3xl text-xl animate-fade-in-down font-epilogue">
                        <p> 32 aniversario</p>
                        <span>Ingeniería de sistemas e informática</span>
                    </div>

                    <h1 class="text-6xl md:text-8xl font-bold text-white animate-fade-in-up float-animation font-russo">
                        Hackathon
                    </h1>

                    <div
                        class="flex flex-wrap items-center justify-center gap-4 text-sm sm:text-base md:text-lg animate-fade-in-up">
                        <span
                            class="w-full sm:w-[220px] md:w-[220px] text-center bg-black/80 px-4 sm:px-6 py-3 rounded-3xl backdrop-blur-sm border border-blue-500/40 hover:shadow-blue-500/20 hover:shadow-xl">
                            Noviembre 29
                        </span>
                        <span
                            class="w-full sm:w-[220px] md:w-[220px] text-center bg-black/80 px-4 sm:px-6 py-3 rounded-3xl backdrop-blur-sm border border-blue-500/40 hover:shadow-blue-500/20 hover:shadow-xl">
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
