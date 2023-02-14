<script setup></script>
<template>
    <button
        class="flex px-3 py-1 rounded-3xl text-white bg-[#499AEA] items-center justify-center"
        @click="closeModal"
    >
        <slot />
    </button>
</template>
