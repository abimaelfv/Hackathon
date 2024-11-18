<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref } from "vue";

const props = defineProps({
    n_exito: Number,
    faileds: {
        type: Array,
        default: [],
    },
});

const form = useForm({
    archivo: null,
});

const refArchivo = ref(null);

function prevFile(event) {
    form.archivo = event.target.files[0];
}

const submit = () => {
    const posicion = window.scrollY;
    form.post(route("cargar.registro"), {
        onFinish: () => {
            window.scrollTo(0, posicion);
            form.reset();
            refArchivo.value.value = null;
        },
    });
};
</script>

<template>
    <AppLayout :title="$t('Cargar registro')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t("Cargar registro") }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <div v-if="props.n_exito > 0"
                        class="mb-4 p-4 bg-green-100 text-green-800 border border-green-400 rounded">
                        Se importaron {{ props.n_exito }} registros
                        correctamente.
                    </div>

                    <form @submit.prevent="submit" enctype="multipart/form-data">
                        <div>
                            <InputLabel for="archivo" :value="$t('Cargar archivo')" />
                            <input ref="refArchivo" type="file" @change="prevFile"
                                class="mt-4 block w-full border border-gray-200 focus:shadow-sm rounded-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200 file:border-0 file:bg-gray-100 ltr:file:mr-4 rtl:file:ml-4 file:py-3 file:px-4" />
                            <InputError class="mt-2" :message="form.errors.archivo" />
                            <InputError class="mt-2" :message="$page.props.errors.error" />
                        </div>

                        <div class="flex items-center justify-end my-4">
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                {{ $t("Cargar datos") }}
                            </PrimaryButton>
                        </div>
                    </form>

                    <div v-if="props.faileds.length > 0"
                        class="mb-4 p-4 bg-blue-100 text-blue-800 border border-blue-400 rounded">
                        <p class="mb-4">
                            Las siguientes datos no se importaron (ya existen en
                            la base de datos):
                        </p>
                        <ul>
                            <li v-for="(fila, id) in props.faileds" :key="id" class="text-sm">
                                <strong>{{ id + 1 }}</strong> -
                                {{ fila[1] }} -
                                {{ fila[2] }}
                                {{ fila[3] }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
