<template>
  <div
    class="htm-layout h-screen max-h-screen overflow-hidden text-base-content"
  >
    <div class="htm-inner flex">
      <aside
        class="ht-base-transition htm-sidebar transition"
        :class="isManageSidebarOpen ? ' w-72' : 'w-28'"
      >
        <ManageSidebar :isSidebarOpen="isManageSidebarOpen" />
      </aside>
      <div class="htm-content flex-1">
        <div class="htm-content-inner">
          <header class="htm-header">
            <ManageHeader :isSidebarOpen="isManageSidebarOpen" />
          </header>
          <main
            class="
              htm-content
              py-56
              h-screen
              max-h-screen
              overflow-y-auto
              ht-scrollbar
            "
          >
            <slot />
          </main>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import ManageSidebar from './Components/MSidebar/MSidebar'
import ManageHeader from './Components/MHeader/MHeader'

const components = { ManageHeader, ManageSidebar }

export default {
  name: 'ManageLayout',
  components,

  computed: {
    ...mapGetters({
      isManageSidebarOpen: 'isManageSidebarOpen',
    }),
  },
}
</script>
