<template>
  <section class="ht-section-container" :class="classes">
    <slot />
  </section>
</template>

<script>
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

  computed: {
    classes() {
      return [`px-${this.paddingX}`, `py-${this.paddingY}`]
    },
  },
}
</script>
