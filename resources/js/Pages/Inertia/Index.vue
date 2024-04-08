<template>
    <div v-if="$page.props.flash.message" class="bg-blue-300">
        {{ $page.props.flash.message }}
    </div>
    <div>
        このページはinertia
        indexです。登録された直後だけ、↑にメッセージが青色の背景で表示されます
    </div>
    <ul>
        <li v-for="blog in blogs" :key="blog.id">
            <h1>
                件名：<Link
                    :href="
                        route('inertia.show', {
                            id: blog.id,
                        })
                    "
                    >{{ blog.title }}</Link
                >
            </h1>
            <p>本文：{{ blog.content }}</p>
            <p>-----------------------------</p>
        </li>
    </ul>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { onMounted } from "vue";

const props = defineProps({
    blogs: Array,
});

onMounted(() => {
    console.log(props.blogs);
});
</script>
