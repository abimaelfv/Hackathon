<script setup>
const props = defineProps({
    label: {
        type: String,
        required: true,
    },
    img: {
        type: String,
        required: false
    },
    money: {
        type: Number,
        required: false
    },
    currency: {
        type: String,
        required: false
    }
})

</script>
<template>
    <div
        class="border-white/30 border-[2px] rounded-xl backdrop-blur-sm bg-blue-400/10 px-0 py-3 hover:shadow-blue-500/20 hover:shadow-xl transition-all hover:-translate-y-1 w-auto">
        <!-- body -->
        <div class="rounded-lg items-center content-center flex justify-center">
            <img :src="img" alt="" class="h-40 mx-4 bg-white rounded-lg">
        </div>
        <!-- label -->
        <div class="text-center px-3 py-2">
            <p class="text-lg font-semibold text-wrap w-52">
                {{ label }}
            </p>
            <p v-if="money">💸 {{ money }} {{ currency }} </p>
        </div>
    </div>
</template>