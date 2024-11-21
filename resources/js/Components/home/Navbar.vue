<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { Link } from "@inertiajs/vue3";
import { Menu, X, CodeXml, Github, InstagramIcon } from "lucide-vue-next";

const isMenuOpen = ref(false);
const isScrolled = ref(false);
const activeSection = ref("#inicio");

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const updateActiveSection = () => {
    const sections = [
        { id: "#inicio", element: document.querySelector("#inicio") },
        { id: "#bases", element: document.querySelector("#bases") },
        { id: "#premios", element: document.querySelector("#premios") },
        { id: "#location", element: document.querySelector("#location") },
    ];

    for (const section of sections) {
        if (section.element) {
            const rect = section.element.getBoundingClientRect();
            if (rect.top >= 0 && rect.top < window.innerHeight / 2) {
                activeSection.value = section.id;
                break;
            }
        }
    }
};

const handleScroll = () => {
    isScrolled.value = window.scrollY > 0;
    updateActiveSection();
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
    updateActiveSection();
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});
</script>

<template>
    <nav :class="[
        'xl:px-4 lg:px-9 sm:px-20 xs:px-10 xl:mx-40 lg:mx-42 md:mx-42 sm:mx-30 py-4 fixed z-50 rounded-xl my-2 transition-all duration-500',
        isScrolled ? 'xl:mx-44 lg:mx-42 md:mx-42 sm:mx-37 mx-2 bg-black/80 backdrop-blur-lg border border-white/40 shadow-lg xl:mr-60 xl:ml-60 lg:mr-32 lg:ml-32 sm:ml-11 sm:mr-11 xs:mr-7 xs:ml-7 top-0 left-5 right-4 pl-2' : 'top-0 left-4 right-3 border-none bg-transparent backdrop-blur-2xl'
    ]">
        <div class="flex items-center justify-between relative">
            <!-- Logo (centered) -->
            <a href="#inicio" class="flex hover:scale-105 transition-transform font-semibold text-2xl">
                <div class="flex items-center content-center gap-2 ml-2">
                    PAISI
                    <CodeXml />
                </div>
            </a>

            <!-- Center Menu -->
            <div class="hidden lg:flex items-center gap-12 font-semibold mx-auto">
                <a href="#inicio" :class="activeSection === '#inicio' ? 'text-blue-300 font-bold' : 'hover:text-blue-300'"
                    class="transition-colors cursor-pointer">
                    Inicio
                </a>
                <a href="#bases" :class="activeSection === '#bases' ? 'text-blue-300 font-bold' : 'hover:text-blue-300'"
                    class="transition-colors cursor-pointer">
                    Bases
                </a>
                <a href="#premios"
                    :class="activeSection === '#premios' ? 'text-blue-300 font-bold' : 'hover:text-blue-300'"
                    class="transition-colors cursor-pointer">
                    Premios
                </a>
                <a href="#location"
                    :class="activeSection === '#location' ? 'text-blue-300 font-bold' : 'hover:text-blue-300'"
                    class="transition-colors cursor-pointer">
                    Ubicación
                </a>
            </div>

            <!-- Button (Right) -->
            <div class="hidden lg:block">
                <a href="https://github.com/Transformacion-Digital-UDH" target="_blank">
                    <Github class="ml-8 cursor-pointer hover:stroke-blue-400" />
                </a>
            </div>

            <!-- Hamburger Menu (Mobile) -->
            <button @click="toggleMenu" class="lg:hidden p-2 rounded-md hover:bg-gray-800/40 mr-2">
                <Menu v-if="!isMenuOpen" class="h-6 w-6 text-white" />
                <X v-else class="h-6 w-6 text-white" />
            </button>
        </div>

        <!-- Mobile Menu -->
        <div v-if="isMenuOpen" class="lg:hidden mt-4 py-4 px-2 bg-black/80 backdrop-blur-lg rounded-xl text-center">
            <div class="flex flex-col gap-4">
                <a href="#inicio" :class="activeSection === '#inicio' ? 'text-blue-300 font-bold' : 'hover:text-blue-300'"
                    class="px-4 py-2 transition-colors cursor-pointer">
                    Inicio
                </a>
                <a href="#bases" :class="activeSection === '#bases' ? 'text-blue-300 font-bold' : 'hover:text-blue-300'"
                    class="px-4 py-2 transition-colors cursor-pointer">
                    Bases
                </a>
                <a href="#premios"
                    :class="activeSection === '#premios' ? 'text-blue-300 font-bold' : 'hover:text-blue-300'"
                    class="px-4 py-2 transition-colors cursor-pointer">
                    Premios
                </a>
                <a href="#location"
                    :class="activeSection === '#location' ? 'text-blue-300 font-bold' : 'hover:text-blue-300'"
                    class="px-4 py-2 transition-colors cursor-pointer">
                    Ubicación
                </a>
                <!-- <div class="flex justify-center">
                    <Link :href="$page.props.auth.user ? '/panel' : '/login'"
                        class="block w-full text-center px-4 py-2 rounded-lg bg-[#113475cc] text-white hover:bg-blue-800 transition">
                    {{ $page.props.auth.user ? 'Ir al panel' : '¡ Inscribete ya !' }}
                    </Link>
                </div> -->
            </div>
        </div>
    </nav>
</template>
