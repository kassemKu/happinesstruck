<template>
  <div
    class="htm-sidebar flex flex-col bg-base-300 bg-opacity-40 text-gray-500"
    :class="isSidebarOpen ? ' w-72' : 'w-28'"
  >
    <div class="htm-logo-container">
      <Link
        href="/"
        class="
          htm-sidebar-logo
          fixed
          top-0
          h-16
          place-content-center
          bg-base-100
          btn btn-ghost
          rounded-none
          text-warning
          font-black
          text-lg
          flex flex-col
          tracking-wider
          transition
          hover:bg-base-100 hover:text-info
          z-30
        "
        :class="isSidebarOpen ? ' w-72' : 'w-28'"
      >
        <CircleFilled32 />
        <span v-if="isSidebarOpen">{{ $t('site_title') }}</span>
      </Link>
    </div>
    <MSideNav />
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import MSideNav from './MSideNav'

const components = { Link, MSideNav }

export default {
  name: 'ManageSidebar',

  components,

  props: {
    isSidebarOpen: {
      type: Boolean,
      required: true,
      default: true,
    },
  },
}
</script>
