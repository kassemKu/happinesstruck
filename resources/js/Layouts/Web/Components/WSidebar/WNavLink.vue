<template>
  <li>
    <button
      type="button"
      class="
        w-full
        h-14
        flex
        items-center
        space-x-2
        px-6
        ltr:border-l-4
        rtl:border-r-4
        border-transparent
        transition
        ease-in-out
        duration-200
        hover:bg-info hover:bg-opacity-10 hover:border-info hover:text-info
      "
      @click="$emit('navigateTo')"
    >
      <slot />
      <span class="capitalize font-medium">{{ title }}</span>
    </button>
  </li>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'WebSidebarLink',
  props: {
    title: {
      type: String,
      default: null,
      required: true,
    },
  },
  emits: ['navigateTo'],
})
</script>
