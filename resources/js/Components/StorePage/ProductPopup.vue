<template>
  <TransitionRoot :show="isOpen">
    <Dialog
      class="
        fixed
        inset-0
        z-40
        h-screen
        w-screen
        bg-primary-content bg-opacity-90
      "
      enter="transform transition ease-in-out duration-500"
      enter-from="bg-opacity-0"
      enter-to="bg-opacity-100"
      leave="transform transition ease-in-out duration-500"
      leave-from="bg-opacity-100"
      leave-to="bg-opacity-0"
      @close="closeProductPopup"
    >
      <TransitionChild
        enter="transform transition ease-in-out duration-500"
        enter-from="translate-y-full"
        enter-to="transition-y-0"
        leave="transform transition ease-in-out duration-500"
        leave-from="transition-y-0"
        leave-to="translate-y-full"
      >
        <div
          class="
            absolute
            inset-0
            my-36
            z-10
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
              @click="closeProductPopup"
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
                      hover:border-success
                      hover:bg-transparent
                      hover:text-success
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
                  perspiciatis molestiae, laudantium facere maxime, nobis
                  mollitia beatae, asperiores deleniti voluptatem repellendus
                  provident? Commodi, pariatur magni ullam quae vitae ducimus
                  minus?
                </p>
              </div>
              <div class="flex flex-col space-y-2 text-sm font-semibold">
                <div class="flex items-center space-x-6">
                  <div class="flex items-center space-x-2">
                    <span v-for="star in 5" :key="star">
                      <VueFeather
                        type="star"
                        class="w-5 h-5 fill-current text-warning"
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
      </TransitionChild>
      <DialogOverlay class="fixed inset-0"></DialogOverlay>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import { mapState } from 'vuex'
import { useStore } from 'vuex'
import { Link } from '@inertiajs/inertia-vue3'

import {
  Dialog,
  DialogOverlay,
  DialogTitle,
  DialogDescription,
  TransitionRoot,
  TransitionChild,
} from '@headlessui/vue'

const components = {
  Dialog,
  DialogOverlay,
  DialogTitle,
  DialogDescription,
  TransitionRoot,
  TransitionChild,
  Link,
}

export default {
  name: 'SingleProductPopup',

  components,

  props: {
    product: {
      type: Object,
      default: () => ({}),
    },
  },

  setup() {
    const store = useStore()

    const closeProductPopup = () => {
      store.commit('closeModal')
    }
    return { closeProductPopup }
  },

  computed: {
    ...mapState({
      isOpen: (state) => state.isModalOpen,
    }),
  },
}
</script>
