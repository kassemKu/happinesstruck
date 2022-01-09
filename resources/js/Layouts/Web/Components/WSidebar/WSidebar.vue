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
          enter-from="-translate-x-full rtl:translate-x-full"
          enter-to="translate-0"
          leave="transform transition ease-in-out duration-200"
          leave-from="translate-0"
          leave-to="-translate-x-full rtl:translate-x-full"
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
                  {{ $t('site_title') }}
                </button>
                <button
                  class="
                    htw-sidebar-close-btn
                    absolute
                    ltr:-right-12
                    rtl:-left-12
                    bg-base-100
                    btn
                    ltr:rounded-r-full
                    rtl:rounded-l-full
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
                    <WNavGroup :title="$t('main')">
                      <WNavLink
                        :title="$t('home')"
                        @navigate-to="navigateTo('web.landing')"
                      >
                        <Home32 class="w-6 h-6" />
                      </WNavLink>
                      <WNavLink
                        :title="$t('our_store')"
                        @navigate-to="navigateTo('web.store')"
                      >
                        <Store32 class="w-6 h-6" />
                      </WNavLink>
                      <WNavLink
                        :title="$t('collections')"
                        @navigate-to="navigateTo('web.collections')"
                      >
                        <Delivery32 class="w-6 h-6" />
                      </WNavLink>
                      <WNavLink
                        :title="$t('our_packages')"
                        @navigate-to="navigateTo('web.packages')"
                      >
                        <DeliveryParcel24 class="w-6 h-6" />
                      </WNavLink>
                    </WNavGroup>
                    <WNavGroup :title="$t('main')">
                      <WNavLink
                        :title="$t('about')"
                        @navigate-to="navigateTo('web.store')"
                      >
                        <Home32 class="w-6 h-6" />
                      </WNavLink>
                      <WNavLink
                        :title="$t('services')"
                        @navigate-to="navigateTo('web.store')"
                      >
                        <Store32 class="w-6 h-6" />
                      </WNavLink>
                      <WNavLink
                        :title="$t('projects')"
                        @navigate-to="navigateTo('web.landing')"
                      >
                        <Delivery32 class="w-6 h-6" />
                      </WNavLink>
                      <WNavLink
                        :title="$t('vision')"
                        @navigate-to="navigateTo('web.packages')"
                      >
                        <DeliveryParcel24 class="w-6 h-6" />
                      </WNavLink>
                    </WNavGroup>
                    <WNavGroup :title="$t('main')">
                      <WNavLink
                        :title="$t('terms')"
                        @navigate-to="navigateTo('web.store')"
                      >
                        <Home32 class="w-6 h-6" />
                      </WNavLink>
                      <WNavLink
                        :title="$t('values')"
                        @navigate-to="navigateTo('web.store')"
                      >
                        <Store32 class="w-6 h-6" />
                      </WNavLink>
                      <WNavLink
                        :title="$t('our_message')"
                        @navigate-to="navigateTo('web.landing')"
                      >
                        <Delivery32 class="w-6 h-6" />
                      </WNavLink>
                      <WNavLink
                        :title="$t('why_us')"
                        @navigate-to="navigateTo('web.packages')"
                      >
                        <DeliveryParcel24 class="w-6 h-6" />
                      </WNavLink>
                    </WNavGroup>
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
import { Inertia } from '@inertiajs/inertia'
import { useStore } from 'vuex'
import { Link } from '@inertiajs/inertia-vue3'
import { TransitionRoot, TransitionChild, Dialog } from '@headlessui/vue'
import WNavGroup from './WNavGroup.vue'
import WNavLink from './WNavLink.vue'

const components = {
  Link,
  TransitionRoot,
  TransitionChild,
  Dialog,
  WNavGroup,
  WNavLink,
}

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
