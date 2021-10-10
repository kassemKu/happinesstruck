<template>
  <HtSection padding-x="0">
    <div
      class="
        htw-landing__products-slider
        bg-neutral
        text-neutral-content
        flex flex-col
      "
    >
      <div
        class="
          htw-landing__new-products-slider
          px-12
          py-8
          flex flex-col
          space-y-6
        "
      >
        <div class="w-full flex items-center space-x-2">
          <h3 class="text-lg uppercase font-semibold">new products</h3>
          <span class="flex-grow bg-base-300 h-px bg-opacity-10"></span>
        </div>
        <div class="bg-cover bg-center relative">
          <div
            class="
              w-full
              h-full
              z-0
              flex
              space-x-8
              overflow-x-hidden
              flex-nowrap
              justify-center
            "
          >
            <div
              v-for="(newProduct, index) in newProducts"
              :key="index"
              class="rounded-box bg-cover bg-center cursor-pointer"
              :style="`background-image: url(${newProduct.src})`"
            >
              <div class="w-64 h-64 relative overflow-hidden">
                <div
                  class="
                    absolute
                    bottom-0
                    glass
                    w-full
                    h-16
                    rounded-b-box
                    flex
                    items-center
                    justify-center
                  "
                >
                  <p class="capitalize font-semibold text-lg">
                    {{ newProduct.name }}
                  </p>
                </div>
              </div>
            </div>
            <!-- slider -->
            <div class="absolute -left-14 top-1/2 z-10">
              <button
                class="
                  btn btn-circle
                  bg-transparent
                  border-base-200
                  transform
                  border-2
                  hover:bg-transparent hover:border-base-200 hover:scale-110
                "
              >
                <VueFeather type="chevron-left" stroke-width="3" />
              </button>
            </div>
            <div class="absolute -right-6 top-1/2 z-10">
              <button
                class="
                  btn btn-circle
                  bg-transparent
                  border-base-200
                  transform
                  border-2
                  hover:bg-transparent hover:border-base-200 hover:scale-110
                "
              >
                <VueFeather type="chevron-right" stroke-width="3" />
              </button>
            </div>
            <!-- arrows -->
          </div>
        </div>
      </div>

      <div
        class="
          htw-landing__new-products-slider
          px-12
          py-8
          flex flex-col
          space-y-6
        "
      >
        <div class="w-full flex items-center space-x-2">
          <h3 class="text-lg uppercase font-semibold">featured products</h3>
          <span class="flex-grow bg-base-300 h-px bg-opacity-10"></span>
        </div>
        <div class="bg-cover bg-center relative">
          <div
            class="
              w-full
              h-full
              z-0
              flex
              space-x-8
              overflow-x-hidden
              flex-nowrap
              justify-center
            "
          >
            <div
              v-for="(newProduct, index) in featuredProducts"
              :key="index"
              class="rounded-box bg-cover bg-center cursor-pointer"
              :style="`background-image: url(${newProduct.src})`"
            >
              <div class="w-64 h-64 relative overflow-hidden">
                <div
                  class="
                    absolute
                    bottom-0
                    glass
                    w-full
                    h-16
                    rounded-b-box
                    flex
                    items-center
                    justify-center
                  "
                >
                  <p class="capitalize font-semibold text-lg">
                    {{ newProduct.name }}
                  </p>
                </div>
              </div>
            </div>
            <!-- slider -->
            <div class="absolute -left-14 top-1/2 z-10">
              <button
                class="
                  btn btn-circle
                  bg-transparent
                  border-base-200
                  transform
                  border-2
                  hover:bg-transparent hover:border-base-200 hover:scale-110
                "
              >
                <VueFeather type="chevron-left" stroke-width="3" />
              </button>
            </div>
            <div class="absolute -right-6 top-1/2 z-10">
              <button
                class="
                  btn btn-circle
                  bg-transparent
                  border-base-200
                  transform
                  border-2
                  hover:bg-transparent hover:border-base-200 hover:scale-110
                "
              >
                <VueFeather type="chevron-right" stroke-width="3" />
              </button>
            </div>
            <!-- arrows -->
          </div>
        </div>
      </div>

      <div
        class="
          htw-landing__new-products-slider
          px-12
          py-8
          flex flex-col
          space-y-6
        "
      >
        <div class="w-full flex items-center space-x-2">
          <h3 class="text-lg uppercase font-semibold">recent products</h3>
          <span class="flex-grow bg-base-300 h-px bg-opacity-10"></span>
        </div>
        <div class="bg-cover bg-center relative">
          <div
            class="
              w-full
              h-full
              z-0
              flex
              space-x-8
              overflow-x-hidden
              flex-nowrap
              justify-center
            "
          >
            <div
              v-for="(newProduct, index) in newProducts"
              :key="index"
              class="rounded-box bg-cover bg-center cursor-pointer"
              :style="`background-image: url(${newProduct.src})`"
            >
              <div class="w-64 h-64 relative overflow-hidden">
                <div
                  class="
                    absolute
                    bottom-0
                    glass
                    w-full
                    h-16
                    rounded-b-box
                    flex
                    items-center
                    justify-center
                  "
                >
                  <p class="capitalize font-semibold text-lg">
                    {{ newProduct.name }}
                  </p>
                </div>
              </div>
            </div>
            <!-- slider -->
            <div class="absolute -left-14 top-1/2 z-10">
              <button
                class="
                  btn btn-circle
                  bg-transparent
                  border-base-200
                  transform
                  border-2
                  hover:bg-transparent hover:border-base-200 hover:scale-110
                "
              >
                <VueFeather type="chevron-left" stroke-width="3" />
              </button>
            </div>
            <div class="absolute -right-6 top-1/2 z-10">
              <button
                class="
                  btn btn-circle
                  bg-transparent
                  border-base-200
                  transform
                  border-2
                  hover:bg-transparent hover:border-base-200 hover:scale-110
                "
              >
                <VueFeather type="chevron-right" stroke-width="3" />
              </button>
            </div>
            <!-- arrows -->
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
      featuredProducts: [
        {
          name: 'first product',
          src: '/images/538c6862971401.Y3JvcCwxMjI4LDk2MCwyOTEsMTcw-removebg-preview.png',
        },
        {
          name: 'first product',
          src: '/images/Barbie_Cover_lifestyle_2_360x.jpg',
        },
        {
          name: 'first product',
          src: '/images/AZhu69ap-image-1-6.jpg',
        },
        {
          name: 'first product',
          src: '/images/659b72077a54ad832458b88d7873792c.jpg',
        },
        {
          name: 'first product',
          src: '/images/products/product_17.jpg',
        },
        {
          name: 'first product',
          src: '/images/products/4387.jpg',
        },
        {
          name: 'first product',
          src: '/images/products/product_23.jpg',
        },
      ],
    }
  },
}
</script>
