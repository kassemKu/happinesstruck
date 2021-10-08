<template>
  <div class="htw-layout-wrapper">
    <header class="htw-header-container">
      <WebHeader />
    </header>
    <main class="htw-main-content">
      <slot />
    </main>
    <section class="htw-footer-container">
      <WebFooter />
    </section>
  </div>
</template>

<script>
import WebHeader from './Components/WHeader/WHeader'
import WebFooter from './Components/WFooter/WFooter'

const components = { WebHeader, WebFooter }

export default {
  name: 'WebLayout',

  components,
}
</script>
