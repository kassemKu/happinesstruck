<template>
  <WebLayout>
    <Head title="Welcome">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-landing-page"></div>
  </WebLayout>
</template>

<script>
import { ref } from 'vue'
import { Head } from '@inertiajs/inertia-vue3'
import gsap from 'gsap'
import WebLayout from '@/Layouts/Web/WebLayout'

const components = {
  Head,
  WebLayout,
}

export default {
  components,

  props: {
    recentProducts: {
      type: Array,
      default: () => [],
    },
    featuredProducts: {
      type: Array,
      default: () => [],
    },
  },

  setup() {},
}
</script>
