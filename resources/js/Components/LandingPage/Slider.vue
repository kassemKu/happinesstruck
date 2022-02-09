<template>
  <div class="htw-slider-wrap relative">
    <div class="htw-slider-container bg-base-100">
      <section
        v-for="(index, product) in products"
        :key="index"
        :ref="product[activeSlide]"
        class="htm-slide w-full bg-slate-100 relative"
      ></section>
    </div>
  </div>
</template>

<script>
import { reactive, ref, onBeforeUpdate } from 'vue'

export default {
  name: 'LandingSlider',

  setup() {
    const products = reactive([
      {
        title: 'product name',
        shortDescription:
          'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi tempora hic ullam aliquam enim quas, cum aliquid officiis quasi sit quaerat nulla, quidem, voluptatibus explicabo accusantium praesentium quo? Cumque, animi?',
        media: [
          '/images/659b72077a54ad832458b88d7873792c.jpg',
          '/images/AZhu69ap-image-1-6.jpg',
          '/images/AZhu69ap-image-1-6.jpg',
          '/images/products/product_23.jpg',
        ],
      },
    ])

    const activeSlide = ref(0)

    const slides = ref([activeSlide.value])

    // Make sure to reset the refs before each update.
    onBeforeUpdate(() => {
      slides.value = []
    })

    return { products, slides, activeSlide }
  },
}
</script>
