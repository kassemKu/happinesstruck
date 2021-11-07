<template>
  <WebLayout>
    <Head title="Welcome">
      <meta title="CHECKOUT" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-my__cart-page bg-base-300 bg-opacity-30">
      <HtSection :padding-x="24">
      <div class="pt-36 pb-12 flex flex-col space-y-8">
        <div>
          <h2 class="text-2xl capitalize font-bold leading-10">shopping cart</h2>
        </div>
        <div class="flex space-x-12">
          <div class="w-2/3 flex flex-col space-y-8">
            <div v-for="(item, index) in cart" :key="index" class="flex justify-between border-b items-center py-4">
              <div class="flex items-center space-x-4">
                <img :src="item.src" class="rounded-full w-20 h-20 object-cover border-2"/>
                <div class="flex flex-col font-semibold capitalize">
                <p>{{ item.name }}</p>
                <span class="block text-base-300 text-sm">{{ item.SKU }}</span>
                </div>
              </div>
              <div class="flex items-center space-x-2">
                <button class="block">
                  <VueFeather type="plus"  stroke-width="3" class="h-4 w-4" />
                </button>
                <button class="btn btn-sm bg-neutral bg-opacity-40" disabled="disabled">2</button>
                <button class="block">
                  <VueFeather type="minus" stroke-width="3" class="h-4 w-4" />
                </button>
              </div>
              <div>
                <p class="uppercase font-bold">{{ item.price }} dk</p>
              </div>
              <div>
                <button>
                  <VueFeather type="x" stroke-width="3" class="h-4 w-4" />
                </button>
              </div>
            </div>
          </div>
          <div class="w-1/3 h-80 rounded-box bg-base-100 flex flex-col space-y-4 justify-center sticky top-36 p-8">
            <div class="flex justify-between items-center border-b py-4">
              <span class="block font-semibold text-neutral text-opacity-40 uppercase">subtotal</span>
              <div>
              <div class="rounded-btn py-2 px-4 bg-base-300 bg-opacity-40 text-neutral uppercase font-semibold">232.4 dk</div>
              </div>
            </div>
            <div class="flex justify-between items-center border-b py-4">
              <span class="block font-semibold text-neutral text-opacity-40 uppercase">total</span>
              <div>
              <div class="rounded-btn py-2 px-4 bg-base-300 bg-opacity-40 text-neutral uppercase font-semibold">232.4 dk</div>
              </div>
            </div>
            <button class="btn btn-info mt-8">proceed to checkout</button>
          </div>
        </div>
        <div>
          <button class="btn btn-link space-x-2 text-blue-600">
            <VueFeather type="arrow-left" />
            <span class="font-semibold capitalize">continue shopping</span>
          </button>
        </div>
      </div>
      </HtSection>
    </div>
  </WebLayout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'

export default {
  name: 'WebPageCheckout',
  components: {
    Head,
    WebLayout,
    HtSection,
  },

  data() {
    return {
      cart: [
        {
          name: "first product",
          src: "/images/538c6862971401.Y3JvcCwxMjI4LDk2MCwyOTEsMTcw-removebg-preview.png",
          SKU: '#YTE9812',
          price: 33.4
        },
        {
          name: "first product",
          src: "/images/Barbie_Cover_lifestyle_2_360x.jpg",
          SKU: '#YTE9812',
          price: 33.4
        },
        {
          name: "first product",
          src: "/images/AZhu69ap-image-1-6.jpg",
          SKU: '#YTE9812',
          price: 33.4
        },
        {
          name: "first product",
          src: "/images/659b72077a54ad832458b88d7873792c.jpg",
          SKU: '#YTE9812',
          price: 33.4
        },
        {
          name: "first product",
          src: "/images/products/product_17.jpg",
          SKU: '#YTE9812',
          price: 33.4
        },
        {
          name: "first product",
          src: "/images/products/4387.jpg",
          SKU: '#YTE9812',
          price: 33.4
        },
        {
          name: "first product",
          src: "/images/products/product_23.jpg",
          SKU: '#YTE9812',
          price: 33.4
        },
      ],
    }
  }
}
</script>
