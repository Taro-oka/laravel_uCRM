<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { nl2br } from "@/common.js";
import { Inertia } from "@inertiajs/inertia";

defineProps({
    item: Object,
});

const deleteItem = (id) => {
    // console.log(id);
    Inertia.delete(route("items.destroy", { item: id }), {
        onBefore: () => confirm("本当に削除しますか？"),
    });
};
</script>

<template>
    <Head title="商品詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                商品詳細
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font relative">
                            <div class="container px-5 py-8 mx-auto">
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label
                                                    for="name"
                                                    class="leading-7 text-sm text-gray-600"
                                                    >商品名</label
                                                >
                                                <div
                                                    id="name"
                                                    class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                >
                                                    {{ item.name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label
                                                    for="memo"
                                                    class="leading-7 text-sm text-gray-600"
                                                    >メモ</label
                                                >
                                                <div
                                                    id="memo"
                                                    v-html="nl2br(item.memo)"
                                                    class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out whitespace-pre-wrap"
                                                ></div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label
                                                    for="price"
                                                    class="leading-7 text-sm text-gray-600"
                                                    >値段</label
                                                >
                                                <div
                                                    id="price"
                                                    class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                >
                                                    {{ item.price }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label
                                                    for="status"
                                                    class="leading-7 text-sm text-gray-600"
                                                    >ステータス</label
                                                >
                                                <div
                                                    id="status"
                                                    class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                >
                                                    <span
                                                        v-if="
                                                            item.is_selling ===
                                                            1
                                                        "
                                                        >販売中</span
                                                    >
                                                    <span
                                                        v-if="
                                                            item.is_selling ===
                                                            0
                                                        "
                                                        >停止中</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <Link
                                                as="button"
                                                :href="
                                                    route('items.edit', {
                                                        item: item.id,
                                                    })
                                                "
                                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                            >
                                                編集する
                                            </Link>
                                        </div>
                                        <div class="mt-2 p-2 w-full">
                                            <button
                                                @click="deleteItem(item.id)"
                                                class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg"
                                            >
                                                削除する
                                            </button>
                                        </div>
                                        <div
                                            class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center"
                                        >
                                            <a class="text-indigo-500"
                                                >example@email.com</a
                                            >
                                            <p class="leading-normal my-5">
                                                49 Smith St. <br />Saint Cloud,
                                                MN 56301
                                            </p>
                                            <span class="inline-flex">
                                                <a class="text-gray-500">
                                                    <svg
                                                        fill="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        class="w-5 h-5"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
                                                        ></path>
                                                    </svg>
                                                </a>
                                                <a class="ml-4 text-gray-500">
                                                    <svg
                                                        fill="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        class="w-5 h-5"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
                                                        ></path>
                                                    </svg>
                                                </a>
                                                <a class="ml-4 text-gray-500">
                                                    <svg
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        class="w-5 h-5"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <rect
                                                            width="20"
                                                            height="20"
                                                            x="2"
                                                            y="2"
                                                            rx="5"
                                                            ry="5"
                                                        ></rect>
                                                        <path
                                                            d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
                                                        ></path>
                                                    </svg>
                                                </a>
                                                <a class="ml-4 text-gray-500">
                                                    <svg
                                                        fill="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        class="w-5 h-5"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"
                                                        ></path>
                                                    </svg>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
