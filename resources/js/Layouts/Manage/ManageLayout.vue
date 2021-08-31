<template>
  <div
    class="htm-layout h-screen max-h-screen overflow-hidden text-base-content"
  >
    <div class="htm-inner flex">
      <aside class="htm-sidebar w-72">
        <ManageSidebar />
      </aside>
      <div class="htm-content flex-1">
        <div class="htm-content-inner">
          <header class="htm-header">
            <ManageHeader />
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
          <!-- <footer
            class="
              htm-footer
              fixed
              bottom-0
              h-16
              bg-base-300 bg-opacity-40
              w-full
            "
          >
            footer
          </footer> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ManageSidebar from './Components/MSidebar/MSidebar'
import ManageHeader from './Components/MHeader/MHeader'

const components = { ManageHeader, ManageSidebar }

export default {
  name: 'ManageLayout',
  components,
}
</script>
