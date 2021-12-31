<template>
  <HtSection padding-x="0" padding-y="0">
    <div class="capitalize flex flex-col space-y-12 bg-indigo-50 px-24 py-12">
      <div v-if="featuredProducts.length > 0" class="flex flex-col space-y-8">
        <div class="w-full flex items-center space-x-4">
          <h3 class="text-2xl font-semibold">featured products</h3>
          <div class="flex-grow bg-gray-600 h-px bg-opacity-10"></div>
        </div>
        <carousel
          :items-to-show="4"
          :wrap-around="true"
          :autoplay="2000"
          class="flex-col overflow-x-visible"
        >
          <slide
            v-for="featuredProduct in featuredProducts"
            :key="featuredProduct.id"
            class="px-4"
          >
            <div class="carousel__item w-full h-96">
              <div
                class="
                  htw-landing__products-slide
                  bg-indigo-100
                  shadow-inner
                  overflow-hidden
                "
              >
                <img
                  class="h-64 w-full object-cover overflow-hidden"
                  :src="featuredProduct.media[0].full_url"
                />

                <div class="p-4 flex justify-between items-center">
                  <div>
                    <p class="font-semibold text-sm capitalize leading-8">
                      {{ featuredProduct.en_name }}
                    </p>
                    <p class="font-bold uppercase">
                      {{ featuredProduct.sale_price }} KD
                    </p>
                  </div>
                  <div class="flex space-x-2">
                    <button
                      class="
                        btn btn-outline btn-sm btn-circle
                        transform
                        hover:bg-transparent
                        hover:scale-110
                        hover:text-info
                        hover:border-info
                      "
                      @click.prevent="addToCart(featuredProduct)"
                    >
                      <VueFeather
                        type="shopping-cart"
                        class="w-5 h-5 text-gray-500"
                      />
                    </button>
                    <button
                      class="
                        btn btn-outline btn-sm btn-circle
                        transform
                        hover:bg-transparent
                        hover:scale-110
                        hover:text-info
                        hover:border-info
                      "
                    >
                      <VueFeather type="heart" class="w-5 h-5 text-gray-500" />
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </slide>

          <template #addons>
            <navigation />
            <pagination />
          </template>
        </carousel>
      </div>
      <div v-if="recentProducts.length > 0" class="flex flex-col space-y-8">
        <div class="w-full flex items-center space-x-4">
          <h3 class="text-2xl font-semibold">featured products</h3>
          <div class="flex-grow bg-gray-600 h-px bg-opacity-10"></div>
        </div>
        <carousel
          :items-to-show="4"
          :wrap-around="true"
          :autoplay="2000"
          class="flex-col overflow-x-visible"
        >
          <slide
            v-for="recentProduct in recentProducts"
            :key="recentProduct.id"
            class="px-4"
          >
            <div class="carousel__item w-full h-96">
              <div
                class="
                  htw-landing__products-slide
                  bg-indigo-100
                  shadow-inner
                  overflow-hidden
                "
              >
                <img
                  class="h-64 w-full object-cover overflow-hidden"
                  :src="recentProduct.media[0].full_url"
                />

                <div class="p-4 flex justify-between items-center">
                  <div>
                    <p class="font-semibold text-sm capitalize leading-8">
                      {{ recentProduct.en_name }}
                    </p>
                    <p class="font-bold uppercase">
                      {{ recentProduct.sale_price }} KD
                    </p>
                  </div>
                  <div class="flex space-x-2">
                    <button
                      class="
                        btn btn-outline btn-sm btn-circle
                        transform
                        hover:bg-transparent
                        hover:scale-110
                        hover:text-info
                        hover:border-info
                      "
                      @click.prevent="addToCart(recentProduct)"
                    >
                      <VueFeather
                        type="shopping-cart"
                        class="w-5 h-5 text-gray-500"
                      />
                    </button>
                    <button
                      class="
                        btn btn-outline btn-sm btn-circle
                        transform
                        hover:bg-transparent
                        hover:scale-110
                        hover:text-info
                        hover:border-info
                      "
                    >
                      <VueFeather type="heart" class="w-5 h-5 text-gray-500" />
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </slide>

          <template #addons>
            <navigation />
            <pagination />
          </template>
        </carousel>
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
            >visit our store page</Link
          >
          <div class="w-1/3 bg-gray-600 h-px bg-opacity-10"></div>
        </div>
      </div>
    </div>
  </HtSection>
</template>

<script>
import axios from 'axios'
import { useStore } from 'vuex'
import HtSection from '@/Shared/Layouts/HtSection'
import { Link } from '@inertiajs/inertia-vue3'
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

const components = { HtSection, Link, Carousel, Slide, Pagination, Navigation }

export default {
  name: 'LandingProductsSliders',

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

  setup() {
    const store = useStore()

    const addToCart = (product) => {
      axios.post(route('web.addToCart', product)).then((res) => {
        const { data } = res

        store.commit('updateCartCount', data.count)
      })
    }

    return { addToCart }
  },
}
</script>

<style>
.carousel__prev,
.carousel__next {
  background-color: transparent;
  color: hsla(var(--wa) / 1);
  border: 2px solid;
  border-color: hsla(var(--wa) / 1);
  transform: var(--tw-transform);
  border-radius: 9999px;
  height: 3rem;
  padding: 0;
  width: 3rem;
  user-select: none;
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  animation: button-pop var(--animation-btn, 0.25s) ease-out;
}
.carousel__prev {
  left: -1.5rem;
}
.carousel__next {
  right: -1.5rem;
}
.carousel__prev:hover,
.carousel__next:hover {
  transform: scale(1.1);
}

.carousel__icon {
  width: inherit;
  height: inherit;
}
.htw-landing__products-slide,
.htw-landing__products-slide > img {
  border-top-left-radius: 2.5rem;
  border-bottom-right-radius: 4rem;
}
</style>
