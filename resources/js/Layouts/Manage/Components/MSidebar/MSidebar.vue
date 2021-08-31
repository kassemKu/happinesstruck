<template>
  <div
    class="
      htm-sidebar-container
      flex flex-col
      bg-base-300 bg-opacity-40
      text-gray-500
    "
  >
    <div class="htm-logo-container">
      <Link
        href="/"
        class="
          htm-sidebar-logo
          fixed
          top-0
          w-72
          h-16
          place-content-center
          bg-base-100
          btn btn-ghost
          rounded-none
          text-warning
          font-black
          text-lg
          tracking-wider
          hover:bg-base-100 hover:text-info
          z-10
        "
      >
        happiness truck
      </Link>
    </div>
    <MsideNav />
    <!-- <div class="htm-sidebar-footer-container">
      <footer
        class="
          htm-sidebar-settings
          fixed
          bottom-0
          bg-base-100
          w-72
          h-16
          flex
          items-center
          justify-center
        "
      >
        <button
          class="
            w-12
            h-12
            justify-self-center
            flex
            items-center
            justify-center
            p-2
            rounded-box
            bg-base-300 bg-opacity-40
            shadow-inner
            transform
            hover:scale-105 hover:text-info hover:shadow-2xl
          "
        >
          <Settings24 />
        </button>
      </footer>
    </div> -->
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import MsideNav from './MsideNav'

const components = { Link, MsideNav }

export default {
  name: 'ManageSidebar',

  components,
}
</script>
