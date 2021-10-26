<template>
  <div class="htw-layout-wrapper">
    <header class="htw-header-container">
      <WebHeader />
    </header>
    <WebSidebar :is-web-sidebar-open="isWebSidebarOpen" />
    <main class="htw-main-content">
      <slot />
    </main>
    <section
      v-show="!$page.url.includes('/our-packages')"
      class="htw-footer-container"
    >
      <WebFooter />
    </section>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import WebHeader from './Components/WHeader/WHeader'
import WebFooter from './Components/WFooter/WFooter'
import WebSidebar from './Components/WSidebar/WSidebar'

const components = { WebHeader, WebFooter, WebSidebar }

export default {
  name: 'WebLayout',

  components,

  computed: {
    ...mapState({
      isWebSidebarOpen: (state) => state.isWebSidebarOpen,
    }),
  },
}
</script>
