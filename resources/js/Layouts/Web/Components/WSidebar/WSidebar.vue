<template>
  <div class="htw-sidebar-wrap">
    <TransitionRoot :show="isWebSidebarOpen">
      <Dialog
        class="htw-sidebar-container fixed inset-0 z-40 min-h-screen"
        @close="closeWebSidebar"
      >
        <TransitionChild
          as="template"
          enter="transform transition ease-in-out duration-200"
          enter-from="-translate-x-full"
          enter-to="translate-0"
          leave="transform transition ease-in-out duration-200"
          leave-from="translate-0"
          leave-to="-translate-x-full"
        >
          <aside
            class="
              htw-sidebar
              relative
              z-10
              h-full
              w-80
              bg-base-100
              shadow-2xl
              text-gray-600
              flex flex-col
              justify-between
            "
          >
            <div class="">
              <div
                class="
                  h-24
                  flex
                  items-center
                  justify-center
                  relative
                  shadow
                  bg-base-100
                "
              >
                <button
                  type="button"
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
                    cursor-pointer
                    hover:bg-transparent hover:text-info
                  "
                  @click="navigateTo('web.landing')"
                >
                  <span>happiness</span>
                  <span>truck</span>
                </button>
                <button
                  class="
                    htw-sidebar-close-btn
                    absolute
                    -right-12
                    bg-base-100
                    btn
                    rounded-r-full
                    border-none
                    text-base-300
                    transform
                    hover:scale-110
                    hover:text-error
                    hover:border-none
                    hover:bg-base-100
                  "
                  @click="closeWebSidebar"
                >
                  <VueFeather type="x" stroke-width="3" />
                </button>
              </div>
              <div
                class="
                  h-screen
                  overflow-y-auto
                  ht-scrollbar
                  bg-base-300 bg-opacity-10
                "
              >
                <div class="pb-56 pt-8">
                  <div class="flex flex-col space-y-6">
                    <nav class="flex flex-col space-y-2 border-b">
                      <h4 class="text-gray-400 uppercase px-6 font-semibold">
                        main
                      </h4>
                      <ul class="flex flex-col">
                        <li>
                          <button
                            type="button"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                            @click="navigateTo('web.landing')"
                          >
                            <Home32 class="w-6 h-6" />
                            <span class="capitalize font-medium">home</span>
                          </button>
                        </li>
                        <li>
                          <button
                            type="button"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                            @click="navigateTo('web.store')"
                          >
                            <Store32 class="w-6 h-6" />
                            <span class="capitalize font-medium"
                              >our store</span
                            >
                          </button>
                        </li>
                        <li>
                          <button
                            type="button"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                            @click="navigateTo('web.packages')"
                          >
                            <Delivery32 class="w-6 h-6" />
                            <span class="capitalize font-medium"
                              >our trucks</span
                            >
                          </button>
                        </li>
                        <li>
                          <button
                            type="button"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                            @click="navigateTo('web.packages')"
                          >
                            <DeliveryParcel24 class="w-6 h-6" />
                            <span class="capitalize font-medium"
                              >our packages</span
                            >
                          </button>
                        </li>
                      </ul>
                    </nav>
                    <nav class="flex flex-col space-y-2 border-b">
                      <h4 class="text-gray-400 uppercase px-6 font-semibold">
                        other navigation
                      </h4>
                      <ul class="flex flex-col">
                        <li>
                          <Link
                            href="/store"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                          >
                            <Home32 class="w-6 h-6" />
                            <span class="capitalize font-medium">home</span>
                          </Link>
                        </li>
                        <li>
                          <Link
                            href="/store"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                          >
                            <Store32 class="w-6 h-6" />
                            <span class="capitalize font-medium"
                              >our store</span
                            >
                          </Link>
                        </li>
                        <li>
                          <Link
                            href="/store"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                          >
                            <Delivery32 class="w-6 h-6" />
                            <span class="capitalize font-medium"
                              >our trucks</span
                            >
                          </Link>
                        </li>
                        <li>
                          <Link
                            href="/store"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                          >
                            <DeliveryParcel24 class="w-6 h-6" />
                            <span class="capitalize font-medium"
                              >our packages</span
                            >
                          </Link>
                        </li>
                      </ul>
                    </nav>
                    <nav class="flex flex-col space-y-2">
                      <h4 class="text-gray-400 uppercase px-6 font-semibold">
                        last one
                      </h4>
                      <ul class="flex flex-col">
                        <li>
                          <Link
                            href="/store"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                          >
                            <Home32 class="w-6 h-6" />
                            <span class="capitalize font-medium">home</span>
                          </Link>
                        </li>
                        <li>
                          <Link
                            href="/store"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                          >
                            <Store32 class="w-6 h-6" />
                            <span class="capitalize font-medium"
                              >our store</span
                            >
                          </Link>
                        </li>
                        <li>
                          <Link
                            href="/store"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                          >
                            <Delivery32 class="w-6 h-6" />
                            <span class="capitalize font-medium"
                              >our trucks</span
                            >
                          </Link>
                        </li>
                        <li>
                          <button
                            type="button"
                            class="
                              w-full
                              h-14
                              flex
                              items-center
                              space-x-2
                              px-6
                              border-l-4 border-transparent
                              transition
                              ease-in-out
                              duration-200
                              hover:bg-info
                              hover:bg-opacity-10
                              hover:border-info
                              hover:border-opacity-60
                              hover:text-info
                            "
                            @click="navigateTo('web.packages')"
                          >
                            <DeliveryParcel24 class="w-6 h-6" />
                            <span class="capitalize font-medium"
                              >our packages</span
                            >
                          </button>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="
                h-24
                w-80
                fixed
                bottom-0
                bg-base-100
                mt-48
                shadow
                flex
                items-center
                justify-center
              "
            >
              <button class="flex items-center justify-center space-x-2">
                <div class="avatar online">
                  <div
                    class="
                      rounded-full
                      w-12
                      h-12
                      ring ring-info ring-offset-base-100 ring-offset-2
                    "
                  >
                    <img src="/images/me.png" class="h-10 w-10" />
                  </div>
                </div>
                <VueFeather
                  type="chevron-right"
                  stroke-width="2.5"
                  class="text-base-300"
                />
              </button>
            </div>
          </aside>
        </TransitionChild>
        <TransitionChild
          as="template"
          enter="transition-opacity ease-linear duration-250"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="transition-opacity ease-linear duration-250"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <div
            class="htw-overlay fixed inset-0 bg-gray-100 bg-opacity-90"
            @click="closeWebSidebar"
          ></div>
        </TransitionChild>
      </Dialog>
    </TransitionRoot>
  </div>
</template>

<script>
import { useStore } from 'vuex'
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'
import { TransitionRoot, TransitionChild, Dialog } from '@headlessui/vue'

const components = { Link, TransitionRoot, TransitionChild, Dialog }

export default {
  name: 'WebSidebar',

  components,

  props: {
    isWebSidebarOpen: {
      type: Boolean,
      required: true,
      default: true,
    },
  },

  setup() {
    const store = useStore()

    const closeWebSidebar = () => {
      store.commit('closeWebSidebar')
    }

    const navigateTo = (routeName) => {
      Inertia.get(route(routeName))
      setTimeout(() => {
        store.commit('closeWebSidebar')
      }, 300)
    }

    return { closeWebSidebar, navigateTo }
  },
}
</script>
