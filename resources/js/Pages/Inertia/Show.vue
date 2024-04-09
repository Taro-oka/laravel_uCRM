<script setup>
import { ref, onMounted, watch } from "vue";
import { Inertia } from '@inertiajs/inertia-vue3';

const props = defineProps({
    id: String,
    blog: Object,
});

watch(
    () => props.blog,
    (newVal) => {
        if (newVal) {
            console.log(newVal); // データが設定された後でのみ実行されます
        }
    },
    { immediate: true }
);

const deleteConfirm = (id) => {
    if (!id) {
        return;
    }
    console.log(id);
    Inertia.delete(`/inertia/delete/${id}`, {
        onBefore: () => {
            confirm("本当に削除しますか？");
        },
    });
};
</script>

<template>
    showで渡ってきたID番号は<span class="id">「{{ id }}」</span>です
    <br />
    ブログのタイトルは、<span class="title">{{ blog.title }}</span
    >です
    <br />
    <button @click="deleteConfirm(blog.id)">削除する</button>
</template>

<style lang="scss">
.name {
    font-weight: 700;
}

.id {
    font-weight: 700;
    color: red;
}

.title {
    @extend .id;
}
</style>
