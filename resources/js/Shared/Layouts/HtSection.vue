<template>
  <section class="ht-section-container" :class="`px-${paddingX}`">
    <slot />
  </section>
</template>

<script>
export default {
  name: 'HtSection',

  props: {
    paddingX: {
      type: [String, Number],
      default: 12,
    },
  },
}
</script>
