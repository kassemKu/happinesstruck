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
      <!-- <VueFeather
        type="truck"
        stroke-width="3"
        class="h-10 w-10 text-info-focus"
      /> -->
      <span>truck</span>
    </Link>
    <div class="flex space-x-8">
      <div v-if="!$page.props.user" class="flex">
        <Link
          :href="route('login')"
          class="
            btn btn-ghost
            hover:bg-transparent
            transform
            font-bold
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          login
        </Link>
        <Link
          :href="route('register')"
          class="
            btn btn-ghost
            font-bold
            hover:bg-transparent
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          register
        </Link>
      </div>
      <div v-else class="avatar online cursor-pointer">
        <div
          class="
            rounded-full
            w-10
            h-10
            ring ring-info ring-offset-base-100 ring-offset-2
          "
        >
          <img src="/images/me.png" />
        </div>
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
          <VueFeather type="shopping-bag" stroke-width="2.5" />
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
          <VueFeather type="heart" stroke-width="2.5" />
        </button>
        <button
          class="
            btn btn-ghost
            hover:bg-transparent
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          <VueFeather type="search" stroke-width="2.5" />
        </button>
        <LanguageSwitcher />
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import LanguageSwitcher from '@/Shared/Partials/LanguageSwitcher'

const components = { Link, LanguageSwitcher }

export default {
  name: 'WebHeader',

  components,
}
</script>
