<template>
  <WebLayout>
    <Head :title="singleProduct.en_name">
      <meta title="description" content="lorem ipsum" />
    </Head>

    <div class="my-12 m-4 md:m-8 lg:m-16 p-4 md:p-0">
      <div class="w-full bg-base-200 border rounded-box">
        <div
          class="
            p-4
            md:p-8
            flex flex-col
            md:flex-row
            space-y-8
            md:space-y-0
            items-center
            space-x-0
            md:space-x-12
          "
        >
          <div
            v-if="media.length > 0"
            class="flex flex-col space-y-6 w-full md:w-1/2"
          >
            <figure class="flex justify-center w-full">
              <img
                :src="media[0].full_url"
                class="object-cover w-96 h-full border rounded-box shadow-inner"
              />
            </figure>
            <div
              v-if="media.length > 1"
              class="flex justify-center items-center space-x-4"
            >
              <figure v-for="(img, index) in media" :key="index">
                <img
                  :src="img.full_url"
                  class="
                    object-cover
                    w-20
                    h-20
                    border
                    rounded-box
                    cursor-pointer
                  "
                />
              </figure>
            </div>
          </div>
          <!-- product imgs -->
          <div class="flex-1 flex flex-col space-y-6">
            <div>
              <h1 class="text-2xl font-black capitalize">
                {{ product.en_name }}
              </h1>
            </div>
            <div class="flex space-x-8 items-center">
              <div>
                <h3 class="text-2xl uppercase font-bold">
                  <span>{{ product.sale_price }} </span>
                  <span class="uppercase">
                    {{ $i18n.locale === 'ar' ? 'دك' : 'kd' }}</span
                  >
                </h3>
              </div>
              <!-- <div class="flex space-x-2 items-center">
                <span class="capitalize">quantity: </span>
                <button
                  class="
                    btn btn-outline
                    border-2 border-info
                    text-info
                    btn-xs
                    capitalize
                    hover:border-success hover:bg-transparent hover:text-success
                  "
                >
                  1
                  <VueFeather
                    type="chevron-down"
                    stroke-width="3"
                    class="w-5 h-5"
                  />
                </button>
              </div> -->
            </div>
            <div>
              <p class="inline-block max-w-md text-gray-400 font-medium">
                {{ product.en_description }}
              </p>
            </div>

            <div
              class="
                flex flex-col
                md:flex-row md:items-center md:space-x-6
                text-gray-500
                md:text-xs
                lg:text-sm
              "
            >
              <p>
                last update:
                <span class="capitalize text-info font-semibold">{{
                  new Date(product.updated_at).toDateString()
                }}</span>
              </p>
              <p>
                store: <span class="text-gray-600">{{ product.SKU }}</span>
              </p>
            </div>
            <div>
              <button
                class="btn btn-info mt-4 w-1/2"
                @click.prevent="addToCart"
              >
                add to cart
              </button>
            </div>
          </div>
          <!-- product details -->
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script>
import { reactive } from 'vue'
import axios from 'axios'
import { useStore } from 'vuex'
import { Link } from '@inertiajs/inertia-vue3'
import { Head } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'

const components = {
  Head,
  WebLayout,
  Link,
  HtSection,
}

export default {
  name: 'WebProductPage',

  components,

  props: {
    product: {
      type: Object,
      default: () => ({}),
    },
    media: {
      type: Array,
      default: () => [],
    },
  },

  setup(props) {
    const singleProduct = reactive(props.product)
    const store = useStore()

    const addToCart = () => {
      axios.post(route('web.addToCart', singleProduct)).then((res) => {
        const { data } = res

        store.commit('updateCartCount', data.count)
      })
    }

    return { singleProduct, addToCart }
  },
}
</script>
