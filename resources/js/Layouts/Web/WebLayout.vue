<template>
  <div class="htw-layout-wrapper">
    <header class="htw-header-container">
      <WebHeader />
    </header>
    <main class="htw-main-content px-12">
      <slot />
    </main>
    <footer class="htw-footer-container">footer</footer>
  </div>
</template>

<script>
import WebHeader from './Components/WHeader/WHeader'

const components = { WebHeader }

export default {
  name: 'WebLayout',

  components,
}
</script>
