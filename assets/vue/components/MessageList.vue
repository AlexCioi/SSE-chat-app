<script setup>

import {onBeforeUnmount, onMounted, ref} from "vue";

const message = ref();

let eventSource;

onMounted(() => {
    setTimeout(() => {
        eventSource = new EventSource('/sse');

        eventSource.onmessage = (event) => {
            message.value = event.data;
        }
    }, 1000);

})

onBeforeUnmount(() => {
    if (eventSource) {
        eventSource.close();
    }
});

</script>

<template>
    <div>
        <p>{{ message }}</p>
    </div>
</template>

<style scoped>

</style>
