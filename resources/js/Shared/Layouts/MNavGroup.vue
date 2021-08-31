<template>
  <div class="htm-sidenav__nav-group font-medium mb-6">
    <div
      v-show="groupTitle"
      class="
        htm-sidenav__nav-grouo__title
        w-full
        flex
        items-center
        space-x-2
        mb-4
        px-4
        text-gray-400
      "
    >
      <slot name="groupIcon" />
      <h5 class="capitalize text-sm">{{ groupTitle }}</h5>
    </div>
    <div class="grid grid-cols-2 gap-y-8">
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
          mt-4
        "
      ></div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ManageSideNavGroup',

  props: {
    groupTitle: {
      type: String,
      required: false,
      default: null,
    },
  },
}
</script>
