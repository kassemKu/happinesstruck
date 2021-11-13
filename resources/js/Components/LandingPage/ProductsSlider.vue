<template>
  <HtSection padding-x="0" padding-y="0">
    <div class="capitalize flex flex-col space-y-12 bg-indigo-50 px-24 py-12">
      <div class="flex flex-col space-y-8">
        <div class="w-full flex items-center space-x-4">
          <h3 class="text-2xl font-semibold">featured products</h3>
          <div class="flex-grow bg-gray-600 h-px bg-opacity-10"></div>
          <div class="flex items-center justify-end space-x-4">
            <button
              class="
                btn btn-circle
                bg-transparent
                border-warning
                text-warning
                border-2
                transform
                hover:bg-transparent
                hover:border-warning
                hover:text-warning
                hover:scale-110
              "
            >
              <VueFeather type="chevron-left" stroke-width="3" />
            </button>
            <button
              class="
                btn btn-circle
                bg-transparent
                border-warning
                text-warning
                border-2
                transform
                hover:bg-transparent
                hover:border-warning
                hover:text-warning
                hover:scale-110
              "
            >
              <VueFeather type="chevron-right" stroke-width="3" />
            </button>
          </div>
        </div>
        <div class="grid grid-cols-4 gap-x-12">
          <div
            v-for="(featuredProduct, index) in featuredProducts"
            :key="index"
            class="
              htw-landing__products-slide
              bg-indigo-100
              shadow-inner
              overflow-hidden
            "
          >
            <img
              class="h-64 w-full object-cover overflow-hidden"
              :src="featuredProduct.src"
            />

            <div class="p-4">
              <p class="font-semibold text-sm capitalize leading-8">
                {{ featuredProduct.name }}
              </p>
              <p class="font-bold uppercase">{{ featuredProduct.price }} DK</p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-col space-y-8">
        <div class="w-full flex items-center space-x-4">
          <h3 class="text-2xl font-semibold">recent products</h3>
          <div class="flex-grow bg-gray-600 h-px bg-opacity-10"></div>
          <div class="flex items-center justify-end space-x-4">
            <button
              class="
                btn btn-circle
                bg-transparent
                border-warning
                text-warning
                border-2
                transform
                hover:bg-transparent
                hover:border-warning
                hover:text-warning
                hover:scale-110
              "
            >
              <VueFeather type="chevron-left" stroke-width="3" />
            </button>
            <button
              class="
                btn btn-circle
                bg-transparent
                border-warning
                text-warning
                border-2
                transform
                hover:bg-transparent
                hover:border-warning
                hover:text-warning
                hover:scale-110
              "
            >
              <VueFeather type="chevron-right" stroke-width="3" />
            </button>
          </div>
        </div>
        <div class="grid grid-cols-4 gap-x-12">
          <div
            v-for="(recentProduct, index) in newProducts"
            :key="index"
            class="
              htw-landing__products-slide
              bg-indigo-100
              shadow-inner
              overflow-hidden
            "
          >
            <img
              class="h-64 w-full object-cover overflow-hidden"
              :src="recentProduct.src"
            />

            <div class="p-4">
              <p class="font-semibold text-sm capitalize leading-8">
                {{ recentProduct.name }}
              </p>
              <p class="font-bold uppercase">{{ recentProduct.price }} DK</p>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="w-full flex items-center space-x-4">
          <div class="w-1/3 bg-gray-600 h-px bg-opacity-10"></div>
          <Link
            :href="route('web.store')"
            class="
              flex-grow
              btn btn-warning
              rounded-none rounded-tl-xl rounded-br-2xl
              text-base
            "
            >visiste our store page</Link
          >
          <div class="w-1/3 bg-gray-600 h-px bg-opacity-10"></div>
        </div>
      </div>
    </div>
  </HtSection>
</template>

<script>
import HtSection from '@/Shared/Layouts/HtSection'
import { Link } from '@inertiajs/inertia-vue3'

const components = { HtSection, Link }

export default {
  name: 'LandingProductsSliders',

  components,

  data() {
    return {
      newProducts: [
        {
          name: 'first product',
          src: '/images/products/product_11.jpg',
          price: 44.0,
        },
        {
          name: 'first product',
          src: '/images/products/product_22.jpg',
          price: 44.0,
        },
        {
          name: 'first product',
          src: '/images/products/product_24.png',
          price: 44.0,
        },
        {
          name: 'first product',
          src: '/images/products/product_17.jpg',
          price: 32,
        },
      ],
      featuredProducts: [
        {
          name: 'first product',
          src: '/images/products/product_11.jpg',
          price: 23.4,
        },
        {
          name: 'first product',
          src: '/images/products/product_22.jpg',
          price: 23.4,
        },
        {
          name: 'first product',
          src: '/images/AZhu69ap-image-1-6.jpg',
          price: 23.4,
        },
        {
          name: 'first product',
          src: '/images/Barbie_Cover_lifestyle_2_360x.jpg',
          price: 101.3,
        },
      ],
    }
  },
}
</script>

<style scoped>
.htw-landing__products-slide,
.htw-landing__products-slide > img {
  border-top-left-radius: 2.5rem;
  border-bottom-right-radius: 4rem;
}
</style>
