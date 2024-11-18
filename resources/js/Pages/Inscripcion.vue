<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import DialogModal from "@/Components/DialogModal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const modal = ref(true);

const closeModal = () => {
    // modal.value = false;
};

</script>

<template>
    <AppLayout :title="$t('Inscripción')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t("Inscripción") }}
            </h2>
        </template>

        <DialogModal :show="modal">
            <template #title>
                {{ $t("Inscripción") }}
            </template>

            <template #content>
                <div>
                    {{ $t("Gracias por inscribirse en la convocatoria.") }}
                </div>
            </template>

            <template #footer>
                <SecondaryButton>
                    {{ $t("Cerrar") }}
                </SecondaryButton>
            </template>
        </DialogModal>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-6">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8">
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                <!-- Nombre del equipo -->
                                <div class="md:col-span-3">
                                    <InputLabel for="equipo" :value="$t('Nombre del equipo')" />
                                    <TextInput type="text" class="mt-2 py-3 block w-full" required />
                                </div>

                                <!-- Categoría -->
                                <div class="md:col-span-2">
                                    <InputLabel for="categoria" :value="$t('Categoría')" />
                                    <select
                                        class="mt-2 py-3 block w-full border-gray-300 focus:border-udh_1 focus:ring-udh_1 rounded-md shadow-sm"
                                        required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="A">Categoría A: Estudiantes de 1ro a 6to ciclo</option>
                                        <option value="B">Categoría B: Estudiantes de 7mo a 10mo ciclo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="border rounded-md mt-6">
                                <div class="bg-gray-200 p-4 flex items-center justify-between">
                                    <h4 class="text-udh_3 font-semibold">Integrantes</h4>
                                    <button class="bg-udh_1 text-white py-2 px-4 rounded" @click="modal = true">
                                        Agregar
                                    </button>
                                </div>
                                <div class="p-4">
                                    <div class="relative overflow-x-auto">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                                                    <th scope="col" class="px-6 py-3">
                                                        Acción
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
                                                        Silver
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        Laptop
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        $2999
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>


    </AppLayout>
</template>
