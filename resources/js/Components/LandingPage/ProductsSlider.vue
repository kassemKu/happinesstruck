<template>
  <HtSection padding-x="0">
    <div class="htw-landing__products-slider bg-neutral text-neutral-content">
      <div
        class="htw-landing__new-products-slider p-12 flex flex-col space-y-8"
      >
        <h3 class="text-lg uppercase font-semibold">new products</h3>
        <div
          class="
            relative
            flex
            space-x-8
            flex-no-wrap
            bg-cover bg-center
            p-4
            rounded-box
          "
          style="background-image: url(/images/products/product_9.jpg)"
        >
          <div
            v-for="(newProduct, index) in newProducts"
            :key="index"
            class="w-72 h-72 rounded-box bg-cover bg-center"
            :style="`background-image: url(${newProduct.src})`"
          >
            {{ newProduct.name }}
          </div>
          <div class="absolute -left-14 top-1/2">
            <button
              class="
                btn btn-circle
                bg-transparent
                border-base-200
                transform
                border-2
                hover:bg-transparent hover:border-base-200 hover:scale-105
              "
            >
              <VueFeather type="chevron-left" stroke-width="3" />
            </button>
          </div>
          <div class="absolute -right-6 top-1/2">
            <button
              class="
                btn btn-circle
                bg-transparent
                border-base-200
                transform
                border-2
                hover:bg-transparent hover:border-base-200 hover:scale-105
              "
            >
              <VueFeather type="chevron-right" stroke-width="3" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </HtSection>
</template>

<script>
import HtSection from '@/Shared/Layouts/HtSection'

const components = { HtSection }

export default {
  name: 'LandingProductsSliders',

  components,

  data() {
    return {
      newProducts: [
        {
          name: 'first product',
          src: '/images/products/product_11.jpg',
        },
        {
          name: 'first product',
          src: '/images/products/product_17.jpg',
        },
        {
          name: 'first product',
          src: '/images/products/product_24.png',
        },
        {
          name: 'first product',
          src: '/images/products/product_11.jpg',
        },
      ],
    }
  },
}
</script>
