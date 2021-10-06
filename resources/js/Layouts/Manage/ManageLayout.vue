<template>
  <div
    class="htm-layout h-screen max-h-screen overflow-hidden text-base-content"
  >
    <div class="htm-inner flex">
      <aside
        class="ht-base-transition htm-sidebar-container transition"
        :class="isManageSidebarOpen ? ' w-72' : 'w-28'"
      >
        <ManageSidebar :is-sidebar-open="isManageSidebarOpen" />
      </aside>
      <div class="htm-content flex-1">
        <div class="htm-content-inner">
          <header class="htm-header-container">
            <ManageHeader :is-sidebar-open="isManageSidebarOpen" />
          </header>
          <slot name="breadcrumb" />
          <main
            class="
              htm-content
              pb-20
              pt-48
              px-8
              bg-base-300 bg-opacity-20
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
import { mapState } from 'vuex'
import ManageSidebar from './Components/MSidebar/MSidebar'
import ManageHeader from './Components/MHeader/MHeader'

const components = { ManageHeader, ManageSidebar }

export default {
  name: 'ManageLayout',
  components,

  computed: {
    ...mapState({
      isManageSidebarOpen: (state) => state.isManageSidebarOpen,
      applyTheme: (state) => state.applyTheme,
    }),
  },
}
</script>
