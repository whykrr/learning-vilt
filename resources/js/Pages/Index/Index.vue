<template>
    <div>Index</div>
    <div>Message : {{ message }}</div>
</template>

<script setup>
const props = defineProps({
    message: String,
});
</script>
