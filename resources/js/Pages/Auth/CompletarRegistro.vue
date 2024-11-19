<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    user: Object,
    persona: Object,
});

const form = useForm({
    documento: props.persona?.per_documento ?? '',
    name: props.persona?.per_nombres ? props.persona.per_nombres : props.user.name,
    apellidos: props.persona?.per_apellidos ? props.persona.per_apellidos : props.user.apellidos,
    phone: props.persona?.per_telefono ?? '',
    genero: props.persona?.per_genero ?? ''
});

const submit = () => {
    form.errors = {};
    form.post(route("completar.registro"));
};
</script>

<template>

    <Head title="Completar Registro" />
    <GuestLayout>
        <div class="text-center mb-5">
            <h1 class="block text-xl font-bold text-udh_3">Datos Personales</h1>
        </div>

        <div class="mb-6">
            <p class="text-sm text-gray-600">
                Antes de continuar, le solicitamos amablemente que complete sus
                datos personales.
            </p>
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="documento" :value="$t('DNI')" />
                <TextInput id="documento" v-model="form.documento" type="text" class="mt-1 block w-full" required
                    autocomplete="off" />
                <InputError class="mt-2" :message="form.errors.documento" />
            </div>

            <div class="mt-4">
                <InputLabel for="name" :value="$t('Name')" />
                <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required
                    autocomplete="off" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="apellidos" :value="$t('Apellidos')" />
                <TextInput id="apellidos" v-model="form.apellidos" type="text" class="mt-1 block w-full" required
                    autocomplete="off" />
                <InputError class="mt-2" :message="form.errors.apellidos" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mt-4">
                <!-- Nombre del equipo -->
                <div class="md:col-span-3">
                    <InputLabel for="phone" :value="$t('Phone')" />
                    <TextInput id="phone" v-model="form.phone" type="text" class="mt-1 block w-full" required
                        autocomplete="off" />
                    <InputError class="mt-2" :message="form.errors.phone" />
                </div>

                <!-- Categoría -->
                <div class="md:col-span-3">
                    <InputLabel for="genero" :value="$t('Género')" />
                    <select
                        class="block w-full border-gray-300 focus:border-udh_1 focus:ring-udh_1 rounded-md shadow-sm"
                        required v-model="form.genero">
                        <option value="" disabled selected hidden>Seleccione...</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.genero" />
                </div>
            </div>

            <div class="mt-8 flex items-center justify-between">
                <Link :href="route('logout')" method="post" as="button"
                    class="text-udh_1 hover:underline decoration-2 font-semibold">
                {{ $t("Log Out") }}
                </Link>

                <PrimaryButton class="py-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ $t("Completar Registro") }}
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
