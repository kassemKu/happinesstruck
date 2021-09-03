<template>
  <div class="htm-sidenav__nav-group font-medium mb-6">
    <div
      v-show="groupTitle && isManageSidebarOpen"
      class="
        htm-sidenav__nav-grouo__title
        w-full
        flex
        items-center
        space-x-2
        mb-6
        px-6
        text-gray-400
      "
    >
      <slot name="groupIcon" />
      <h5 class="capitalize text-sm">{{ groupTitle }}</h5>
    </div>
    <div
      class="grid gap-y-8"
      :class="isManageSidebarOpen ? 'grid-cols-2' : 'grid-cols-1'"
    >
      <slot />
    </div>
    <div class="w-full flex justify-center">
      <div
        class="
          htm-sidenav__nav-group__divider
          w-5/6
          h-px
          bg-base-300 bg-opacity-40
          shadow-inner
          mt-6
        "
      ></div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'ManageSideNavGroup',

  props: {
    groupTitle: {
      type: String,
      required: false,
      default: null,
    },
  },

  computed: {
    ...mapGetters({
      isManageSidebarOpen: 'isManageSidebarOpen',
    }),
  },
}
</script>
