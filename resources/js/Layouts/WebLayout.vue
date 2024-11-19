<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const navbarOpen = ref(false);
const loggedIn = ref(false);
</script>

<template>
    <header class="absolute px-4 left-0 top-0 z-50 w-full shadow-md border-b">
        <div class="container mx-auto">
            <div class="relative flex items-center justify-between">
                <div class="w-60 max-w-full">
                    <Link :href="'/'" class="block w-full py-5">
                    <img src="/img/logo.webp" alt="logo" class="block w-full dark:hidden" />
                    <img src="/img/logo.webp" alt="logo" class="hidden w-full dark:block" />
                    </Link>
                </div>
                <div class="flex w-full items-center justify-between px-4">
                    <div>
                        <button @click="navbarOpen = !navbarOpen"
                            class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg py-[6px] lg:hidden">
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-udh_3 dark:bg-white"></span>
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-udh_3 dark:bg-white"></span>
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-udh_3 dark:bg-white"></span>
                        </button>
                        <nav
                            class="absolute right-4 top-full w-full max-w-[200px] rounded-lg bg-white px-6 py-5 shadow transition-all lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:shadow-none xl:ml-2 dark:bg-dark-2">
                            <ul class="block lg:flex">
                                <!-- <li>
                                    <Link :href="'/'" class="flex py-2 font-sm font-bold text-udh_3 hover:text-primary lg:ml-10 lg:inline-flex dark:text-white">
                                        Inicio
                                    </Link>
                                </li> -->
                                <li>
                                    <a href="/nosotros"
                                        class="flex py-2 font-sm font-bold text-udh_3 hover:text-primary lg:ml-10 lg:inline-flex dark:text-white">
                                        Bases
                                    </a>
                                </li>
                                <li>
                                    <a href="/nosotros"
                                        class="flex py-2 font-sm font-bold text-udh_3 hover:text-primary lg:ml-10 lg:inline-flex dark:text-white">
                                        Lugar
                                    </a>
                                </li>
                                <li class="mt-3 block sm:hidden">
                                    <Link v-if="loggedIn" :href="route('panel')"
                                        class="px-3 py-1 text-sm font-bold border bg-udh_3 text-white hover:text-white rounded-sm">
                                    {{ $t('Dashboard') }}
                                    </Link>
                                    <Link v-else :href="route('login')"
                                        class="px-3 py-1 text-sm font-bold border border-udh_3 text-dark hover:bg-udh_3 hover:text-white text-udh_3 rounded-sm">
                                    {{ $t('Login') }}
                                    </Link>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="hidden justify-end pr-16 sm:flex lg:pr-0">
                        <nav class="-mx-3 flex flex-1 justify-end">
                            <Link v-if="loggedIn" :href="route('panel')"
                                class="px-3 py-1 text-sm font-bold border bg-udh_3 text-white hover:text-white rounded-sm">
                            {{ $t('Dashboard') }}
                            </Link>
                            <Link v-else :href="route('login')"
                                class="px-3 py-1 text-sm font-bold border border-udh_3 text-dark hover:bg-udh_3 hover:text-white text-udh_3 rounded-sm">
                            {{ $t('Login') }}
                            </Link>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-[70px] sm:pt-[100px] relative px-4 w-full">
        <div class="relative bg-white">
            <div class="container mx-auto">
                <slot />
            </div>
        </div>
    </main>

    <footer class="p-4 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto pt-6">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <Link :href="'/'" class="inline-block">
                    <img src="/img/logotipo.webp" class="h-14" alt="Investigación UDH">
                    </Link>
                    <div class="mt-4">
                        <p class="text-gray-600 text-sm">Lugar de la hackathon:</p>
                        <p class="mt-3">
                            <i class="fa-solid fa-location-dot text-udh_1 mr-2"></i>
                            Biblioteca de la UDH. Campus La Esperanza.
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-2">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Sistem Fest</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <a href="/" class="hover:underline text-sm">Programación</a>
                            </li>
                            <li>
                                <a href="/" class="hover:underline text-sm">Tickets fiesta</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Hackathon</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <a href="/" class="hover:underline text-sm">Bases del concurso</a>
                            </li>
                            <li>
                                <a class="text-sm"><i class="fa fa-clock mr-1 text-udh_1"></i> De 08:00 a 14:00 h</a>
                            </li>
                            <li>
                                <a class="text-sm"><i class="fa fa-calendar mr-1 text-udh_1"></i> Martes 26 de
                                    noviembre</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024
                    <Link :href="'/'" class="hover:underline font-bold text-udh_3">
                    {{ $page.props.app_name }}
                    </Link>.
                    Todos los derechos reservados.
                </span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <i class="text-gray-500 hover:text-udh_3 dark:hover:text-white text-sm">Síguenos:</i>
                    <a href="https://www.facebook.com/UDHPAISI" target="_blank"
                        class="text-gray-500 hover:text-udh_3 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </a>
                    <a href="https://github.com/Transformacion-Digital-UDH" target="_blank"
                        class="text-gray-500 hover:text-udh_3 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>


</template>
