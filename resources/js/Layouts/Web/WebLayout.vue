<template>
  <div class="htw-layout-wrapper" data-barba="wrapper">
    <header class="htw-header-container">
      <WebHeader />
    </header>
    <!-- <WebSidebar :is-web-sidebar-open="isWebSidebarOpen" /> -->
    <main
      class="htw-main-content"
      data-barba="container"
      data-barba-namespace="home"
    >
      <slot />
    </main>
    <section class="htw-footer-container">
      <WebFooter />
    </section>
  </div>
</template>

<script>
// barba page transition
import { mapState } from 'vuex'
import WebHeader from './Components/WHeader/WHeader'
import WebFooter from './Components/WFooter/WFooter'
import WebSidebar from './Components/WSidebar/WSidebar'

// barba.use(barbaCss)

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
