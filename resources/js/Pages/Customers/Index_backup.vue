<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import FlashMessage from "@/Components/FlashMessage.vue";
import Pagination from "@/Components/Pagination.vue";
import { onMounted, ref } from "vue";

// ページネーション指定しているので、複雑なオブジェクトで返ってくる
// この中のlinksというプロパティは、最大15件のリンクした返してこないため、本来あるはずのリンク数より少なく返ってくるが、エラーではない！！
defineProps({
    customers: Object,
});
</script>

<template>
    <ul v-for="customer in customers.data" :key="customer.id">
        <li>{{ customer.id }}</li>
        <li>{{ customer.name }}</li>
    </ul>
    <Pagination :links="customers.links"></Pagination>
</template>
