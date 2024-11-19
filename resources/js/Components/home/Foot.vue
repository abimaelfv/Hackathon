<script setup>
import { ref } from 'vue'
import { Github, InstagramIcon } from 'lucide-vue-next'

const yearCurrent = ref(new Date().getFullYear())
</script>
<template>
    <footer class="flex justify-between flex-col space-y-3 md:flex-row text-center border-t border-gray-700/50 py-10 items-center content-center">
        <div class="flex items-center">
            <a href="#header" class="text-2xl">
                <p class="text-2xl font-russo">Hackathon</p>
            </a>
            <a href="https://github.com/Transformacion-Digital-UDH" target="_blank">
                <Github class="ml-8 cursor-pointer hover:stroke-blue-400" />
            </a>
        </div>
        <p class="text-gray-400">© {{ yearCurrent }} Hackaton - LTD - UDH. Todos los derechos reservados.
        </p>
    </footer>
</template>