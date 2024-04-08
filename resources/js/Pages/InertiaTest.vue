<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const newTitle = ref("");
const newContent = ref("");
</script>

<template>
    Inertiaテストです<br />
    <a href="/">aタグ経由でHOMEへ</a><br />
    <Link href="/">Link経由でHOMEへ</Link><br />
    <Link :href="route('inertia.index')">名前付きルートの確認です</Link><br />
    <Link :href="route('inertia.show', { id: 1 })"
        >ルートパラメーターのテストです</Link
    >
    <div class="mb-8"></div>
    <input
        type="text"
        name="newTitle"
        v-model="newTitle"
        placeholder="タイトル"
    /><br />
    <input
        type="text"
        name="newContent"
        v-model="newContent"
        placeholder="コンテンツ"
    /><br />
    <Link
        as="button"
        :href="route('inertia.store')"
        :data="{ title: newTitle, content: newContent }"
        method="post"
        >DB保存テスト！</Link
    ><br />
    <Link href="/inertia/create">Createへ</Link><br />
</template>
