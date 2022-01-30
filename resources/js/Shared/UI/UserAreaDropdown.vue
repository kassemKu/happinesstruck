<template>
  <div class="htm-header__user-area-actions relative">
    <Menu as="div">
      <div>
        <MenuButton
          class="
            mth-header__user-action
            btn btn-block
            h-16
            space-x-2
            btn-ghost
            rounded-none
            text-info
            hover:bg-transparent hover:text-warning
          "
        >
          <span class="font-bold">{{ $page.props.user.full_name }}</span>
          <img
            src="/images/me.png"
            class="h-10 w-10 mask mask-squircle border"
          />
          <ChevronDown16 class="w-5 h-5" stroke-width="3" />
        </MenuButton>
      </div>
      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class="
            absolute
            w-56
            mt-2
            bg-white
            overflow-hidden
            rounded-box
            shadow-2xl
            z-10
            rtl:left-12 rtl:origin-top-left
            ltr:right-12 ltr:origin-top-right
            ring-1 ring-black ring-opacity-5
            focus:outline-none
          "
        >
          <MenuItem>
            <Link
              :href="route('web.landing')"
              class="
                flex
                items-center
                space-x-2
                px-2
                h-14
                capitalize
                ltr:border-l-2
                rtl:border-r-2
                font-medium
                border-transparent border-opacity-50
                hover:border-info hover:bg-base-300
              "
            >
              <VueFeather
                type="home"
                class="w-6 h-6 ltr:mr-2 rtl:ml-2 hover-group:text-info"
                aria-hidden="true"
              />
              {{ $t('home') }}
            </Link>
          </MenuItem>
          <MenuItem v-if="$page.props.isAdmins">
            <Link
              :href="route('manage.dashboard')"
              class="
                flex
                items-center
                space-x-2
                px-2
                h-14
                capitalize
                ltr:border-l-2
                rtl:border-r-2
                font-medium
                border-transparent border-opacity-50
                hover:border-info hover:bg-base-300
              "
            >
              <VueFeather
                type="bar-chart-2"
                class="w-6 h-6 ltr:mr-2 rtl:ml-2 hover-group:text-info"
                aria-hidden="true"
              />
              {{ $t('dashboard') }}
            </Link>
          </MenuItem>
          <MenuItem>
            <Link
              :href="route('web.landing')"
              class="
                flex
                items-center
                space-x-2
                px-2
                h-14
                capitalize
                ltr:border-l-2
                rtl:border-r-2
                font-medium
                border-transparent border-opacity-50
                hover:border-info hover:bg-base-300
              "
            >
              <VueFeather
                type="smile"
                class="w-6 h-6 ltr:mr-2 rtl:ml-2 hover-group:text-info"
                aria-hidden="true"
              />
              {{ $t('profile') }}
            </Link>
          </MenuItem>
          <template v-if="!$page.props.isAdmins">
            <MenuItem>
              <Link
                :href="route('web.landing')"
                class="
                  flex
                  items-center
                  space-x-2
                  px-2
                  h-14
                  ltr:border-l-2
                  rtl:border-r-2
                  font-medium
                  border-transparent border-opacity-50
                  hover:border-info hover:bg-base-300
                "
              >
                <VueFeather
                  type="shopping-bag"
                  class="w-6 h-6 ltr:mr-2 rtl:ml-2 hover-group:text-info"
                  aria-hidden="true"
                />
                {{ $t('orders') }}
              </Link>
            </MenuItem>
            <MenuItem>
              <Link
                :href="route('web.landing')"
                class="
                  flex
                  items-center
                  space-x-2
                  px-2
                  h-14
                  ltr:border-l-2
                  rtl:border-r-2
                  font-medium
                  border-transparent border-opacity-50
                  hover:border-info hover:bg-base-300
                "
              >
                <VueFeather
                  type="truck"
                  class="w-6 h-6 ltr:mr-2 rtl:ml-2 hover-group:text-info"
                  aria-hidden="true"
                />
                {{ $t('bookings') }}
              </Link>
            </MenuItem>
          </template>
          <MenuItem>
            <button
              class="
                w-full
                flex
                items-center
                space-x-2
                px-2
                h-14
                capitalize
                ltr:border-l-2
                rtl:border-r-2
                font-medium
                border-transparent border-opacity-50
                hover:border-info hover:bg-base-300
              "
              @click="logout"
            >
              <VueFeather
                type="log-out"
                class="w-6 h-6 ltr:mr-2 rtl:ml-2 hover-group:text-info"
                aria-hidden="true"
              />
              {{ $t('logout') }}
            </button>
          </MenuItem>
        </MenuItems>
      </transition>
    </Menu>
  </div>
</template>

<script>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { Link } from '@inertiajs/inertia-vue3'

const components = { Menu, MenuButton, MenuItems, MenuItem, Link }

export default {
  name: 'UserAreaDropdown',

  components,

  methods: {
    logout() {
      this.$inertia.post(route('logout'))
    },
  },
}
</script>
