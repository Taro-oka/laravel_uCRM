<script setup>
import { onMounted, ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { CLASS_MAP } from "@/Utils/classMap.js";

const getStatus = () => {
    return usePage().props.value.flash.status ?? null;
};

const dynamicClass = ref([]);

const updateDynamicClass = () => {
    const status = getStatus();
    if (!status) {
        return;
    }

    dynamicClass.value = [CLASS_MAP[status] || ""];
};

onMounted(() => {
    updateDynamicClass();
});
</script>

<template>
    <div
        v-if="$page.props.flash.status"
        class="text-white p-4"
        :class="dynamicClass"
    >
        {{ $page.props.flash.message }}
    </div>
</template>
