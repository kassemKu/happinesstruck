<template>
  <WebLayout>
    <Head title="Welcome">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-landing-page">
      <!-- <div class="htw-page__section htw-section__slider">
        <Slider />
      </div> -->
      <div class="htw-page__section htw-section__main-sections">
        <MainSections />
      </div>
      <div class="htw-page__section htw-section__products-slider">
        <template
          v-if="recentProducts.length > 0 || featuredProducts.length > 0"
        >
          <ProductsSlider
            :recent-products="recentProducts"
            :featured-products="featuredProducts"
          />
        </template>
      </div>
      <div class="htw-page__section htw-section__single-service">
        <SingleService />
      </div>
      <div class="bg-gradient-to-b from-yellow-50 via-indigo-50 to-yellow-50">
        <OurClientSays />
        <OurGallery />
        <RecentBlog />
      </div>
    </div>
  </WebLayout>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import MainSections from '@/Components/LandingPage/MainSections'
import ProductsSlider from '@/Components/LandingPage/ProductsSlider'
import SingleService from '@/Components/LandingPage/Service'
import OurClientSays from '@/Components/LandingPage/OurClientSays'
import OurGallery from '@/Components/LandingPage/OurGallery'
import RecentBlog from '@/Components/LandingPage/RecentBlog'
// import Slider from '@/Components/LandingPage/Slider'

const components = {
  Head,
  Link,
  WebLayout,
  MainSections,
  ProductsSlider,
  SingleService,
  OurClientSays,
  OurGallery,
  RecentBlog,
  // Slider,
}

export default {
  components,

  // Link,
  // WebLayout,
  // MainSections,
  // ProductsSlider,
  // SingleService,
  // OurClientSays,
  // OurGallery,
  // RecentBlog,
  // Slider,
  // },

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
}
</script>
