<script setup></script>

<template>
    <div
        v-if="$page.props.flash.status"
        class="text-white p-4"
        :class="{
            'bg-blue-300': $page.props.flash.status === 'success',
            'bg-red-300': $page.props.flash.status === 'danger',
        }"
    >
        {{ $page.props.flash.message }}
    </div>
</template>
