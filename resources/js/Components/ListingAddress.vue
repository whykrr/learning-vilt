<template>
    <div>
        {{ listing.street }} {{ listing.street_num }}, {{ listing.city }}
    </div>
</template>

<script setup>
defineProps({
    listing: Object,
});
</script>