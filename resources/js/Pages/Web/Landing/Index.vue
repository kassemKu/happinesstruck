<template>
  <WebLayout>
    <Head title="Welcome">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-landing-page">
      <div class="htw-page__section htw-section__banner">
        <PackagesSlider />
      </div>
      <div class="htw-page__section htw-section__products-slider">
        <ProductsSlider />
      </div>
      <div class="htw-page__section htw-section__single-service">
        <SingleService />
      </div>
      <div class="bg-gradient-to-b from-yellow-50 via-indigo-50 to-yellow-50">
        <OurClientSays />
        <OurGallery />
        <RcentBlog />
      </div>
    </div>
  </WebLayout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import PackagesSlider from '@/Components/LandingPage/Slider'
import ProductsSlider from '@/Components/LandingPage/ProductsSlider'
import SingleService from '@/Components/LandingPage/Service'
import OurClientSays from '@/Components/LandingPage/OurClientSays'
import OurGallery from '@/Components/LandingPage/OurGallery'
import RcentBlog from '@/Components/LandingPage/RcentBlog'

export default {
  components: {
    Head,
    // Link,
    WebLayout,
    PackagesSlider,
    ProductsSlider,
    SingleService,
    OurClientSays,
    OurGallery,
    RcentBlog,
  },
}
</script>
