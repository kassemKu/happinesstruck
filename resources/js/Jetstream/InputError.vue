<template>
    <div v-show="message">
        <p class="text-sm text-red-600">
            {{ message }}
        </p>
    </div>
</template>

<script>
/* eslint-disable vue/require-prop-types */
    export default {
        props: ['message']
    }
</script>
