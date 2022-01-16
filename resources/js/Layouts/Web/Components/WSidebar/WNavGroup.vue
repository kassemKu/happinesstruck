<template>
  <nav class="flex flex-col space-y-2 border-b">
    <h4 class="text-gray-400 uppercase px-6 font-semibold">
      {{ title }}
    </h4>
    <ul class="flex flex-col">
      <slot />
    </ul>
  </nav>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'WebSidebarNavGroup',
  props: {
    title: {
      type: String,
      default: null,
      required: true,
    },
  },
})
</script>
