<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { formatDateTime } from '@/helpers.js';
import axios from 'axios';

const modal = ref(false);

const props = defineProps({
    inscripciones: Object
})

const inscripcion = ref({});

const detalles = async (id) => {
    try {
        const response = await axios.get(route('inscripciones.view', id));
        if (response.data.status) {
            modal.value = true
            inscripcion.value = response.data.data
        } else {
            throw response.data.msg
        }
    } catch (error) {
    }
};

</script>

<template>
    <AppLayout title="Incripciones">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t("Incripciones") }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-4">
                    <a :href="route('inscripciones.exportar')"
                        class="nline-flex items-center px-4 py-2 bg-udh_1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150 hover:opacity-85">
                        <i class="fa-solid fa-file-export mr-1"></i> Exportar
                    </a>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        N°
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre de equipo
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Categoría
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Postulación
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(inscripcion, i) in inscripciones"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ i + 1 }}
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ inscripcion.ins_equipo }}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{ inscripcion.ins_categoria }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ formatDateTime(inscripcion.ins_fecha) }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="bg-udh_1 text-white py-1 px-2 rounded text-sm"
                                            @click="detalles(inscripcion.ins_id)">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <DialogModal :show="modal" :maxWidth="'4xl'">
            <template #title>
                <h5>Detalles</h5>
            </template>
            <template #content>
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <!-- Nombre del equipo -->
                    <div class="md:col-span-3">
                        <InputLabel :value="$t('Nombre del equipo')" />
                        <div class="border p-4 mt-2 font-bold">{{ inscripcion.ins_equipo }}</div>
                    </div>

                    <!-- Categoría -->
                    <div class="md:col-span-2">
                        <InputLabel :value="$t('Categoría')" />
                        <div class="border p-3 mt-2 text-xl text-center font-bold">{{ inscripcion.ins_categoria }}</div>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="p-3 bg-gray-200 text-udh_3 font-medium">Integrantes</p>
                    <div class="p-4 bg-gray-100">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Código
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nombres y Apellidos
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Teléfono
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="inscripcion.integrantes.length > 0"
                                        v-for="integrante in inscripcion.integrantes"
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ integrante.user.codigo }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ integrante.user.name + ' ' + integrante.user.apellidos }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ integrante.user.phone }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </template>
            <template #footer>
                <SecondaryButton @click="modal = false">
                    {{ $t("Cerrar") }}
                </SecondaryButton>
            </template>
        </DialogModal>
    </AppLayout>
</template>