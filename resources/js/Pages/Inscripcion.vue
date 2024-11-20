<script setup>
import { ref, computed } from "vue";
import { useForm, router } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import Modal from "@/Components/DialogModal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import axios from "axios";

const props = defineProps({
    inscripcion: Object,
})

const modal = ref(false);
const modalConfirm = ref(false);

const dataConfirmar = ref();

const isEditable = computed(() => props.inscripcion.ins_estado !== 1);

const closeModal = () => {
    modal.value = false;
};

const openModal = () => {
    form.reset();
    form.clearErrors();
    modal.value = true;
};

const form = useForm({
    ins_id: props.inscripcion.ins_id,
    codigo: '',
    nombres: ''
});

const insc = useForm({
    ins_id: props.inscripcion.ins_id,
    equipo: props.inscripcion.ins_equipo ?? '',
    categoria: props.inscripcion.ins_categoria ?? ''
});

const buscar = async () => {
    form.errors = {}
    if (form.codigo) {
        try {
            const response = await axios.get(route('personas.buscar', form.codigo));
            if (response.data.status) {
                const datos = response.data.data
                form.codigo = datos.codigo
                form.nombres = datos.name + ' ' + datos.apellidos
            } else {
                form.nombres = ''
                throw response.data.msg
            }
        } catch (error) {
            form.errors.codigo = error
        }
    } else {
        form.errors.codigo = 'Ingrese el código del estudiante'
    }
};

const guardar = () => {
    if (form.nombres) {
        form.post(route('agregar.miembro'), {
            preserveScroll: true,
            onSuccess: () => {
                closeModal()
                form.reset();
                form.clearErrors();
            },
            onFinish: () => {
            }
        });
    } else {
        form.errors.codigo = 'Primero debes buscar al estudiante.'
    }
}

const eliminar = (id) => {
    const posicion = window.scrollY
    router.delete(route('eliminar.miembro', id), {
        onSuccess: () => {

        },
        onFinish: () => {
            window.scrollTo(0, posicion)
        }
    });
};

const actualizarInscripcion = () => {
    insc.post(route('actualizar.incripcion'), {
        preserveScroll: true,
    });
}

const validar = async (ins_id) => {
    try {
        const response = await axios.get(route('validar.incripcion', ins_id));
        if (response.data.status) {
            modalConfirm.value = true
            dataConfirmar.value = response.data
        } else {
            throw response.data.msg
        }
    } catch (error) {
        form.errors.equipo = error
    }
};

const confirmar = (id) => {
    router.post(route('confirmar.incripcion', id), {}, {
        preserveScroll: true,
        onSuccess: () => {
            modalConfirm.value = false;
        },
    });
};

</script>

<template>
    <AppLayout :title="$t('Inscripción')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t("Inscripción") }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-6">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8">
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                <!-- Nombre del equipo -->
                                <div class="md:col-span-3">
                                    <InputLabel for="equipo" :value="$t('Nombre del equipo')" />
                                    <TextInput type="text" class="mt-2 py-3 block w-full" v-model="insc.equipo" required
                                        :disabled="!isEditable" />
                                    <InputError class="mt-2" :message="insc.errors.equipo" />
                                </div>

                                <!-- Categoría -->
                                <div class="md:col-span-2">
                                    <InputLabel for="categoria" :value="$t('Categoría')" />
                                    <select
                                        class="mt-2 py-3 block w-full border-gray-300 focus:border-udh_1 focus:ring-udh_1 rounded-md shadow-sm"
                                        required v-model="insc.categoria" :disabled="!isEditable">
                                        <option value="" disabled selected hidden>Seleccione...</option>
                                        <option value="A">Categoría A: Estudiantes de 1ro a 6to ciclo</option>
                                        <option value="B">Categoría B: Estudiantes de 7mo a 10mo ciclo</option>
                                    </select>
                                    <InputError class="mt-2" :message="insc.errors.categoria" />
                                </div>
                            </div>

                            <div class="border rounded-md mt-6">
                                <div class="bg-gray-200 p-4 flex items-center justify-between">
                                    <h4 class="text-udh_3 font-semibold">Integrantes</h4>
                                    <button class="bg-udh_1 text-white py-2 px-4 rounded text-sm" @click="openModal"
                                        v-if="inscripcion.integrantes.length < 4">
                                        <i class="fa fa-plus mr-1"></i>
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
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        Acción
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
                                                    <td class="px-6 py-4 text-center">
                                                        <button class="cursor-pointer p-2" :disabled="!isEditable"
                                                            :class="{ 'opacity-25 cursor-not-allowed': !isEditable }"
                                                            @click="eliminar(integrante.int_id)">
                                                            <i class="fa fa-trash text-red-600"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr v-else>
                                                    <td colspan="4" class="px-6 py-3">
                                                        <span class="text-center text-gray-600">
                                                            {{ $t("Agrega 4 integrantes para confirmar la inscripción.")
                                                            }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div
                                class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-4 space-y-4 sm:space-y-0">
                                <div class="text-sm">
                                    Estado de postulación:
                                    <span class="ml-2 font-bold px-2 py-1 rounded" :class="{
                                        'text-red-600 bg-red-100': inscripcion.ins_estado == 2,
                                        'text-green-600 bg-green-100': inscripcion.ins_estado != 2,
                                    }">
                                        {{ inscripcion.ins_estado == 2 ? 'Borrador' : 'Confirmada' }}
                                    </span>
                                </div>

                                <div class="flex flex-wrap gap-2">
                                    <PrimaryButton :class="{ 'opacity-25': insc.processing }" v-if="isEditable"
                                        :disabled="insc.processing" @click="actualizarInscripcion"
                                        class="w-full sm:w-auto">
                                        {{ $t("Guardar en borrador") }}
                                    </PrimaryButton>

                                    <PrimaryButton class="!bg-green-800 w-full sm:w-auto" v-if="isEditable"
                                        @click="validar(inscripcion.ins_id)">
                                        {{ $t("Confirmar inscripción") }}
                                    </PrimaryButton>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Modal :show="modal" :maxWidth="'lg'">
            <template #title>
                {{ $t("Agregar integrante") }}
            </template>

            <template #content>
                <hr>
                <div class="mt-4">
                    <InputLabel for="dni" :value="$t('Código del estudiante')" />
                    <div class="relative mt-1">
                        <TextInput type="text" v-model="form.codigo" class="mt-2 py-2 block w-full" required />
                        <button type="button" @click="buscar"
                            class="absolute inset-y-0 right-0 px-4 py-1 bg-udh_1 text-white text-sm font-medium rounded-r-md">
                            <i class="fa fa-search px-3"></i>
                        </button>
                    </div>
                    <InputError class="mt-2" :message="form.errors.codigo" />
                </div>
                <div class="mt-6">
                    <TextInput type="text" class="mt-2 py-2 block w-full bg-gray-50" v-model="form.nombres"
                        placeholder="Nombres y apellidos" disabled />
                </div>

            </template>

            <template #footer>
                <SecondaryButton @click="closeModal">
                    {{ $t("Cerrar") }}
                </SecondaryButton>

                <PrimaryButton class="ms-3" @click="guardar">
                    {{ $t("Agregar") }}
                </PrimaryButton>
            </template>
        </Modal>

        <Modal :show="modalConfirm" :maxWidth="'xl'">
            <template #title>
                {{ $t("Confirmar participación") }}
            </template>

            <template #content>
                <hr>
                <div class="pt-4"
                    v-if="dataConfirmar.equipo && dataConfirmar.categoria && dataConfirmar.lider && dataConfirmar.integrantes == 4">
                    <p class="mb-3">¿Estas seguro de confirmar la inscripción?</p>

                    <p>Ten en cuenta que, una vez que confirmes, <b>no podrás realizar modificaciones</b>.</p>
                    <p>Además, recuerda que tu equipo debe contar, como mínimo, con <b>una mujer</b>; de lo contrario,
                        <b>serás descalificado</b>.
                    </p>
                    <br>
                    <p>Si está de acuerdo, presione el botón <b class="text-udh_3">Confirmar</b>.</p>
                </div>
                <div class="mt-4" v-else>
                    <p class="mb-2 font-semibold">Subsanar las siguientes observaciones:</p>
                    <ul class="list-disc ml-6 text-red-500">
                        <li v-if="dataConfirmar.equipo == false" class="mb-2">
                            Añade el nombre de tu equipo.
                        </li>
                        <li v-if="dataConfirmar.categoria == false" class="mb-2">
                            Elige una categoría para participar.
                        </li>
                        <li v-if="dataConfirmar.integrantes != 4" class="mb-2">
                            Asegúrate de que tu equipo tenga 4 integrantes.
                        </li>
                        <li v-if="dataConfirmar.lider == false" class="mb-2">
                            El propietario del equipo no está en los integrantes.
                        </li>
                    </ul>
                    <p class="mt-3">Agradecemos tu colaboración.</p>
                </div>

            </template>

            <template #footer>
                <SecondaryButton @click="modalConfirm = false">
                    {{ $t("Revisar") }}
                </SecondaryButton>

                <PrimaryButton class="ms-3"
                    v-if="dataConfirmar.equipo && dataConfirmar.categoria && dataConfirmar.lider && dataConfirmar.integrantes == 4"
                    @click="confirmar(inscripcion.ins_id)">
                    {{ $t("Confirmar") }}
                </PrimaryButton>
            </template>
        </Modal>

    </AppLayout>
</template>
