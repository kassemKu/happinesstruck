<template>
  <WebLayout>
    <Head title="Welcome">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-landing-page">
      <div class="htw-page__section htw-section__banner">
        <Slider />
      </div>
    </div>
  </WebLayout>
</template>

<script>
import { Head /* Link */ } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import Slider from '@/Components/LandingPage/Slider.vue'

export default {
  components: {
    Head,
    // Link,
    WebLayout,
    Slider,
  },
}
</script>
