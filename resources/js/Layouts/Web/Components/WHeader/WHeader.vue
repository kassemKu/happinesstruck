<template>
  <div
    class="
      htw-header
      flex
      items-center
      justify-between
      px-12
      lg:px-16
      h-36
      fixed
      w-full
      top-0
      z-10
    "
  >
    <div class="htw-header-menu">
      <button
        class="
          htw-menu-btn
          btn btn-outline btn-circle
          border-2
          transform
          hover:bg-transparent hover:scale-110 hover:text-info hover:border-info
        "
        @click.prevent="openWebSidebar"
      >
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          class="stroke-current"
        >
          <path
            d="M7 12L21 12"
            stroke-width="3"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M3 6H21"
            stroke-width="3"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M3 18H21"
            stroke-width="3"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </button>
    </div>
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
      "
    >
      <img
        src="/images/imageedit_3_9616434340.png"
        alt="happiness truck"
        class="object-cover w-36 h-36"
      />
    </Link>
    <div class="flex space-x-8">
      <div v-show="!$page.props.user" class="flex">
        <Link
          :href="route('auth')"
          class="
            btn btn-ghost
            transform
            font-semibold
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          login
        </Link>
        <Link
          :href="route('auth')"
          class="
            btn btn-ghost
            font-semibold
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          register
        </Link>
      </div>
      <div class="htw-header-user_area flex items-center">
        <div class="indicator">
          <div class="indicator-item badge badge-info text-sm font-semibold">
            {{ getCartItemsCount }}
          </div>
          <Link
            :href="route('web.mycart')"
            class="
              btn btn-ghost
              font-semibold
              transform
              hover:bg-transparent hover:text-info hover:scale-110
            "
          >
            <VueFeather type="shopping-bag" />
          </Link>
        </div>
        <button
          class="
            btn btn-ghost
            font-semibold
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          <VueFeather type="heart" />
        </button>
        <button
          class="
            btn btn-ghost
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          <VueFeather type="search" />
        </button>
        <LanguageSwitcher />
        <template v-if="$page.props.user">
          <UserAreaDropdown />
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import { computed, onMounted } from 'vue'
import { useStore } from 'vuex'
import { Link, usePage } from '@inertiajs/inertia-vue3'
import LanguageSwitcher from '@/Shared/Partials/LanguageSwitcher'
import UserAreaDropdown from '@/Shared/UI/UserAreaDropdown'

const components = { Link, LanguageSwitcher, UserAreaDropdown }

export default {
  name: 'WebHeader',

  components,

  setup() {
    const store = useStore()
    const page = usePage()

    const openWebSidebar = () => {
      store.commit('openWebSidebar')
    }

    const getCartItemsCount = computed(() => {
      return store.state.cartCount
    })

    onMounted(() => {
      store.commit('updateCartCount', page.props.value.cartCount)
    })

    return { openWebSidebar, getCartItemsCount }
  },
}
</script>
