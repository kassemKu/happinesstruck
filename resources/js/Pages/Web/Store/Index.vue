<template>
  <WebLayout>
    <Head title="STORE">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div
      class="
        htw-page htw-page__store
        bg-base-200
        flex
        min-h-screen
        my-36
        mx-16
        overflow-hidden
        border
        rounded-3xl
      "
    >
      <div class="w-64 flex flex-col border-r capitalize font-medium">
        <div
          class="h-16 flex items-center space-x-2 px-6 border-b text-gray-400"
        >
          <VueFeather type="filter" />
          <h5 class="text-xl">filters</h5>
        </div>
        <div class="border-b px-6 py-6 flex flex-col space-y-6">
          <h5 class="font-medium text-gray-500">categories</h5>
          <ul class="flex flex-col space-y-8">
            <li class="flex space-x-2">
              <input type="checkbox" class="checkbox" />
              <span class="text-sm">category one</span>
            </li>
            <li class="flex space-x-2">
              <input type="checkbox" class="checkbox" />
              <span class="text-sm">category tow</span>
            </li>
            <li class="flex space-x-2">
              <input type="checkbox" class="checkbox" />
              <span class="text-sm">category three</span>
            </li>
            <li class="flex space-x-2">
              <input type="checkbox" class="checkbox" />
              <span class="text-sm">category foure</span>
            </li>
          </ul>
        </div>
        <div class="border-b px-6 py-6 flex flex-col space-y-6">
          <h5 class="font-medium text-gray-500">price range</h5>
          <div class="flex items-center justify-between">
            <span class="uppercase text-gray-400">max</span>
            <input
              type="text"
              placeholder="400DK"
              class="input input-bordered w-24"
            />
          </div>
          <button class="btn btn btn-info capitalize">set price</button>
        </div>
        <div class="px-4 py-6 flex flex-col space-y-6">
          <h5 class="font-medium text-gray-500">rating</h5>
          <div class="flex items-center justify-between">
            <input
              type="checkbox"
              checked="checked"
              class="checkbox checkbox-accent"
            />
            <div class="flex items-center space-x-2">
              <span v-for="star in 5" :key="star">
                <VueFeather
                  type="star"
                  class="text-gray-400 w-5 h-5 fill-current text-warning"
                />
              </span>
            </div>
            <span class="lowercase text-sm">above</span>
          </div>
        </div>
      </div>
      <!-- filters -->
      <div class="flex-1 flex flex-col space-y-8 p-10">
        <div
          class="
            relative
            flex
            items-center
            w-full
            text-base-300
            focus-within:text-info
          "
        >
          <VueFeather
            type="search"
            stroke-width="3"
            class="absolute ml-3 pointer-events-none"
          />
          <input
            placeholder="Search..."
            class="
              pr-4
              pl-10
              py-2
              border-none
              rounded-xl
              w-full
              ring-1 ring-base-300
              text-neture-content
              placeholder-base-300
              font-semibold
              focus:ring-1 focus:ring-info
            "
            type="search"
            name="search"
            aria-label="search"
            autocomplete="off"
          />
          <button
            class="
              btn btn-ghost
              hover:bg-transparent
              absolute
              right-2
              group-focus:text-yellow-300
            "
          >
            <VueFeather
              type="x"
              stroke-width="3"
              class="absolute right-0 h-5 w-5"
            />
          </button>
        </div>
        <!-- search -->

        <div class="capitalize">
          <p class="text-gray-400">
            result for search
            <b class="text-base-content">"some searchable"</b>
          </p>
        </div>
        <!-- result text -->
        <div class="flex items-center space-x-16 capitalize">
          <p class="text-gray=500">sort</p>
          <div class="flex space-x-4">
            <button class="btn btn-accent capitalize btn-sm">relevance</button>
            <button
              class="
                btn btn-outline
                border-base-300
                text-gray-400
                btn-sm
                capitalize
                hover:border-gray-500 hover:bg-transparent hover:text-gray-500
              "
            >
              popular
            </button>
            <button
              class="
                btn btn-outline
                border-base-300
                text-gray-400
                btn-sm
                capitalize
                hover:border-gray-500 hover:bg-transparent hover:text-gray-500
              "
            >
              most new
            </button>
            <button
              class="
                btn btn-outline
                border-base-300
                text-gray-400
                btn-sm
                capitalize
                hover:border-gray-500 hover:bg-transparent hover:text-gray-500
              "
            >
              price
              <VueFeather
                type="chevron-down"
                stroke-width="3"
                class="w-5 h-5"
              />
            </button>
          </div>
        </div>
        <!-- sort -->
        <div>
          <div class="grid grid-cols-3 gap-6">
            <div
              v-for="(product, index) in products"
              :key="index"
              class="rounded-3xl border border-base-300 p-6 relative"
            >
              <button
                class="
                  btn btn-outline btn-square
                  absolute
                  border-none
                  right-4
                  btn-sm
                  bg-red-500 bg-opacity-10
                "
              >
                <VueFeather
                  type="heart"
                  class="fill-current text-error w-5 h-5"
                />
              </button>
              <figure class="flex items-center justify-center">
                <img
                  :src="product.src"
                  class="object-scale-down w-full h-64 rounded-3xl"
                />
              </figure>
              <div class="flex flex-col space-y-6 mt-4">
                <div class="flex flex-col">
                  <h2 class="card-title font-semibold capitalize">
                    {{ product.name }} (L)
                  </h2>
                  <div class="flex items-center space-x-2">
                    <div class="flex items-center space-x-2">
                      <span v-for="star in 5" :key="star">
                        <VueFeather
                          type="star"
                          class="
                            text-gray-400
                            w-5
                            h-5
                            fill-current
                            text-warning
                          "
                        />
                      </span>
                    </div>
                    <span class="uppercase text-sm">(85)</span>
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-gray-400">price</p>
                    <span class="font-semibold">{{ product.price }} DK</span>
                  </div>
                  <button
                    class="
                      btn btn-outline
                      border-base-300
                      text-gray-400
                      btn-sm
                      capitalize
                      hover:border-gray-500
                      hover:bg-transparent
                      hover:text-gray-500
                    "
                  >
                    add to cart
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- products view -->
      </div>
      <!-- <div class="w-72">side right</div> -->
    </div>
  </WebLayout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'

const components = {
  Head,
  WebLayout,
}

export default {
  name: 'WebStorePage',

  components,

  data() {
    return {
      products: [
        {
          name: 'first product',
          src: '/images/products/product_14-removebg-preview.png',
          price: 65,
        },
        {
          name: 'first product',
          src: '/images/products/4387-removebg-preview.png',
          price: 65,
        },
        {
          name: 'first product',
          src: '/images/products/fun-3d-illustration-astronaut-with-vr-helmet-removebg-preview.png',
          price: 65,
        },
        {
          name: 'first product',
          src: '/images/538c6862971401.Y3JvcCwxMjI4LDk2MCwyOTEsMTcw-removebg-preview.png',
          price: 65,
        },
        {
          name: 'first product',
          src: '/images/imageedit_7_9494288863-removebg-preview.png',
          price: 65,
        },
        {
          name: 'first product',
          src: '/images/products/4387.jpg',
          price: 65,
        },
      ],
    }
  },
}
</script>
