<template>
    <label class="block font-medium text-sm text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot></slot></span>
    </label>
</template>

<script>
/* eslint-disable vue/require-prop-types */
    export default {
        props: ['value']
    }
</script>
