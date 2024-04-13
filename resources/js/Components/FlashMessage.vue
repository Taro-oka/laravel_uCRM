<script setup>
import { onMounted, ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
const showStatus = () => {
    return usePage().props.value.flash.status ?? null;
};
const status = ref("");
const dynamicClass = ref([]);

const addClass = () => {
    status.value = showStatus();
    if (!status.value) {
        return;
    }
    let classStrings = "";
    if (status.value === "success") {
        classStrings = "bg-blue-300";
    } else if (status.value === "danger") {
        classStrings = "bg-red-300";
    }
    classStrings = classStrings.split(" ");
    dynamicClass.value.push(...classStrings);
};

onMounted(() => {
    addClass();
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
