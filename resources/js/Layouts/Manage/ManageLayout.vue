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
            <div class="bg-error text-white">
              <span>is sidebar open: </span>
              <pre class="font-bold uppercase">{{ isManageSidebarOpen }}</pre>
            </div>
            <div class="bg-warning text-white">
              <span>active theme: </span>
              <pre class="font-bold uppercase">{{ applyTheme }}</pre>
            </div>
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
