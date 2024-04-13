<script setup>
import { Link } from "@inertiajs/inertia-vue3";
const { links } = defineProps({
    links: Array,
});
console.log(links);
</script>

<template>
    <div v-if="links.length > 3">
        <div class="flex flex-row justify-center flex-wrap -mb-1">
            <template v-for="(link, index) in links" :key="index">
                <div
                    v-if="link.url === null"
                    v-html="link.label"
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                ></div>
                <Link
                    v-else
                    :href="link.url"
                    v-html="link.label"
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                    :class="{ 'bg-blue-700 text-white': link.active }"
                ></Link>
            </template>
        </div>
    </div>
</template>
