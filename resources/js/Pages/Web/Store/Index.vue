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
        rounded-box
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
              class="
                rounded-box
                border border-base-300
                p-6
                relative
                cursor-pointer
                shadow-inner
                transform
                transition
                duration-500
                ease-in-out
                hover:shadow-2xl
              "
              @click="setIsOpen(true)"
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
  <Dialog class="fixed inset-0 z-40" :open="isOpen" @close="setIsOpen">
    <div class="fixed inset-0 h-screen w-screen bg-primary-content">
      <div
        class="
          absolute
          inset-0
          my-36
          mx-auto
          rounded-3xl
          bg-base-200
          shadow-2xl
          max-w-screen-lg
          border-t-8 border-info
        "
      >
        <div class="px-12 py-8 flex items-center justify-between">
          <Link
            href="/"
            class="
              htw-header-logo
              inline-flex
              items-center
              justify-center
              space-x-2
              uppercase
              font-black
              text-xl text-warning
              transform
              hover:bg-transparent hover:text-info
              focus:outline-none
            "
          >
            <span>happiness</span>
            <span>truck</span>
          </Link>
          <button
            class="
              htw-product-popup-close-btn
              btn btn-outline btn-circle
              border-2
              transform
              hover:bg-transparent
              hover:scale-110
              hover:text-error
              hover:border-error
            "
            @click="setIsOpen(false)"
          >
            <VueFeather type="x" stroke-width="3" />
          </button>
        </div>
        <div class="flex items-center justify-between px-24 mt-24 relative">
          <div class="w-1/2 flex flex-col space-y-6 items-center">
            <figure class="flex justify-center">
              <img
                src="/images/products/fun-3d-illustration-astronaut-with-vr-helmet-removebg-preview.png"
                class="object-scale-down w-96 h-96"
              />
            </figure>
            <div class="w-full flex items-center space-x-2">
              <span
                v-for="dot in 3"
                :key="dot"
                class="
                  inline-block
                  w-5
                  h-5
                  rounded-full
                  bg-base-300
                  cursor-pointer
                "
              ></span>
            </div>
            <button
              class="
                absolute
                right-0
                top-1/3
                h-36
                w-14
                bg-info
                flex
                items-center
                justify-center
                text-base-100
                rounded-l-lg
              "
            >
              <VueFeather
                type="chevron-right"
                stroke-width="3"
                class="w-8 h-8"
              />
            </button>
            <button
              class="
                absolute
                left-0
                top-1/3
                h-36
                w-14
                bg-info
                flex
                items-center
                justify-center
                text-base-100
                rounded-r-lg
              "
            >
              <VueFeather
                type="chevron-right"
                stroke-width="3"
                class="w-8 h-8"
              />
            </button>
          </div>

          <div class="flex-1 flex flex-col space-y-6 -ml-8">
            <div>
              <h1 class="text-4xl font-black capitalize">product name</h1>
            </div>
            <div class="flex space-x-8 items-center">
              <div>
                <h3 class="text-2xl uppercase font-bold">12 DK</h3>
              </div>
              <div class="flex space-x-2 items-center">
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
              </div>
            </div>
            <div>
              <p class="inline-block max-w-md text-gray-400 font-medium">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa
                perspiciatis molestiae, laudantium facere maxime, nobis mollitia
                beatae, asperiores deleniti voluptatem repellendus provident?
                Commodi, pariatur magni ullam quae vitae ducimus minus?
              </p>
            </div>
            <div class="flex flex-col space-y-2 text-sm font-semibold">
              <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-2">
                  <span v-for="star in 5" :key="star">
                    <VueFeather
                      type="star"
                      class="text-gray-400 w-5 h-5 fill-current text-warning"
                    />
                  </span>
                </div>
                <p>
                  <span class="uppercase text-info">240</span>
                  reviews
                </p>
              </div>
              <div class="flex items-center space-x-6 text-gray-500">
                <p>
                  last update:
                  <span class="capitalize text-info">2 days ago</span>
                </p>
                <p>store: <span class="text-gray-600">#0098888</span></p>
              </div>
            </div>
            <div>
              <button class="btn btn-info btn-lg mt-4 w-1/2">
                add to cart
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Dialog>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { Head } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import { ref } from 'vue'
import {
  Dialog,
  DialogOverlay,
  DialogTitle,
  DialogDescription,
} from '@headlessui/vue'

const components = {
  Head,
  WebLayout,
  Dialog,
  DialogOverlay,
  DialogTitle,
  DialogDescription,
  Link,
}

export default {
  name: 'WebStorePage',

  components,

  setup() {
    let isOpen = ref(false)

    return {
      isOpen,
      setIsOpen(value) {
        isOpen.value = value
      },
    }
  },

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
