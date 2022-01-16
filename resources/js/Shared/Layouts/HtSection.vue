<template>
  <section class="ht-section-container" :class="classes">
    <slot />
  </section>
</template>

<script>
import { computed } from 'vue'
export default {
  name: 'HtSection',

  props: {
    paddingX: {
      type: [String, Number],
      default: 16,
      required: false,
    },
    paddingY: {
      type: [String, Number],
      default: 8,
      required: false,
    },
  },

  setup(props) {
    const classes = computed(() => {
      return [`px-8 sm:px-${props.paddingX.toString()}`, `py-${props.paddingY}`]
    })

    return { classes }
  },
}
</script>
