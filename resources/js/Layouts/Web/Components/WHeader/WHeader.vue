<template>
  <div
    class="
      htw-header
      flex
      items-center
      justify-between
      px-12
      lg:px-16
      h-24
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
      <span>happiness</span>
      <span>truck</span>
    </Link>
    <div class="flex space-x-8">
      <div v-show="!$page.props.user" class="flex">
        <Link
          :href="route('login')"
          class="
            btn btn-ghost
            hover:bg-transparent
            transform
            font-medium
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          login
        </Link>
        <Link
          :href="route('register')"
          class="
            btn btn-ghost
            font-medium
            hover:bg-transparent
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          register
        </Link>
      </div>
      <div class="htw-header-user_area flex">
        <button
          class="
            btn btn-ghost
            font-semibold
            hover:bg-transparent
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          <ShoppingCartArrowDown24 class="w-7 h-7" />
        </button>
        <button
          class="
            btn btn-ghost
            font-semibold
            hover:bg-transparent
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          <Favorite24 class="w-7 h-7" />
        </button>
        <button
          class="
            btn btn-ghost
            hover:bg-transparent
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          <Search24 class="w-7 h-7" />
        </button>
        <LanguageSwitcher />
      </div>
    </div>
  </div>
</template>

<script>
import { useStore } from 'vuex'
import { Link } from '@inertiajs/inertia-vue3'
import LanguageSwitcher from '@/Shared/Partials/LanguageSwitcher'

const components = { Link, LanguageSwitcher }

export default {
  name: 'WebHeader',

  components,

  setup() {
    const store = useStore()

    const openWebSidebar = () => {
      store.commit('openWebSidebar')
    }

    return { openWebSidebar }
  },
}
</script>
