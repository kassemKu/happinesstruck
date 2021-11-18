<template>
  <Link
    :href="href"
    class="
      flex flex-col
      space-y-3
      group
      w-full
      items-center
      justify-center
      cursor-pointer
    "
    preserve-scroll
  >
    <span
      class="
        ht-base-transition
        transform
        w-12
        h-12
        justify-self-center
        flex
        items-center
        justify-center
        rounded-box
        shadow-inner
        transform
        group-hover:scale-110
      "
      :class="
        active
          ? 'bg-info scale-110 text-base-100 shadow-3xl group-hover:scale-125'
          : 'bg-base-100 group-hover:text-info group-hover:shadow-2xl'
      "
    >
      <slot name="icon" />
    </span>
    <span
      class="
        block
        text-xs
        font-semibold
        capitalize
        ht-base-transition
        transform
      "
      :class="
        active
          ? 'text-info font-semibold  group-hover:scale-110'
          : ' group-hover:text-info group-hover:font-semibold group-hover:scale-110'
      "
      >{{ name }}</span
    >
  </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

const components = { Link }

export default {
  name: 'ManageSideNavLink',

  components,

  props: {
    name: {
      type: String,
      required: false,
      default: null,
    },
    href: {
      type: String,
      required: true,
      default: null,
    },
    active: {
      type: Boolean,
      required: false,
      default: false,
    },
  },
}
</script>
