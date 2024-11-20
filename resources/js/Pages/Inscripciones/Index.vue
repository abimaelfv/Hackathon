<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { formatDateTime } from '@/helpers.js';

const modal = ref(false);

const props = defineProps({
    inscripciones: Object
})

const detalles = (id) => {
    modal.value = true;
}

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
                        <div class="border p-4 mt-2">Hola</div>
                    </div>

                    <!-- Categoría -->
                    <div class="md:col-span-2">
                        <InputLabel :value="$t('Categoría')" />
                        <div class="border p-3 mt-2 text-xl text-center font-bold">A</div>
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
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            2019110516
                                        </th>
                                        <td class="px-6 py-4">
                                            ABIMAEL EPIFANIO FERNANDEZ VENTURA
                                        </td>
                                        <td class="px-6 py-4">
                                            901231876
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