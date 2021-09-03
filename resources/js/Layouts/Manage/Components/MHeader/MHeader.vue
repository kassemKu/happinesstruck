<template>
  <div
    class="
      htm-header-container
      ht-base-transition
      bg-base-300 bg-opacity-40
      h-16
      flex
      fixed
      inset-0
      w-full
      items-center
      justify-between
      shadow-xl
      transition
    "
    :class="{
      'pr-80': $i18n.locale === 'ar' && isSidebarOpen,
      'pl-80': $i18n.locale !== 'ar' && isSidebarOpen,
      'pr-32': $i18n.locale === 'ar' && !isSidebarOpen,
      'pl-32': $i18n.locale !== 'ar' && !isSidebarOpen,
    }"
  >
    <button
      class="
        btn btn-circle btn-sm btn-outline
        text-gray-600
        border-gray-500
        transform
        hover:bg-transparent
        hover:border-info
        hover:text-info
        hover:scale-105
        hover:shadow
      "
      type="button"
      @click.prevent="toggleManageSidebar"
    >
      <ArrowLeft20 v-if="$i18n.locale !== 'ar' && isSidebarOpen" />
      <ArrowRight20 v-else-if="$i18n.locale !== 'ar' && !isSidebarOpen" />
      <ArrowRight20 v-else-if="$i18n.locale === 'ar' && isSidebarOpen" />
      <ArrowLeft20 v-else />
    </button>
    <div class="flex items-center space-x-8 htm-header__user-area">
      <div class="flex">
        <LanguageSwitcher />
        <div class="dropdown dropdown-right">
          <button
            tabindex="0"
            class="
              btn btn-ghost
              text-gray-500
              transform
              hover:bg-transparent hover:scale-105 hover:text-info
            "
          >
            <PaintBrush24 />
          </button>
          <ul
            tabindex="0"
            class="
              shadow-2xl
              mt-6
              menu
              dropdown-content
              bg-base-100
              rounded-box
              w-36
              h-96
              overflow-y-auto
              ht-scrollbar
            "
          >
            <li v-for="(theme, index) in themes" :key="index">
              <button
                class="
                  btn btn-ghost
                  text-gray-500
                  transform
                  btn-block
                  hover:scale-105
                  hover:text-info
                  hover:bg-info
                  hover:bg-opacity-20
                "
                @click="setTheme(theme)"
              >
                {{ $t(theme) }}
              </button>
            </li>
          </ul>
        </div>
        <button
          class="
            btn btn-ghost
            text-gray-500
            transform
            hover:bg-transparent hover:scale-105 hover:text-info
          "
        >
          <Notification24 />
          <span
            class="absolute top-1 right-4 w-2 h-2 rounded-full bg-info block"
          ></span>
        </button>
        <button
          class="
            btn btn-ghost
            text-gray-500
            transform
            hover:bg-transparent hover:scale-105 hover:text-info
          "
        >
          <Chat24 />
          <span
            class="absolute top-1 right-4 w-2 h-2 rounded-full bg-info block"
          ></span>
        </button>
      </div>
      <button
        class="
          mth-header__user-action
          bg-base-100
          btn
          h-16
          space-x-2
          btn-ghost
          rounded-none
          text-info
          hover:bg-base-100 hover:text-warning
        "
      >
        <span class="font-bold">{{ $t('full_name') }}</span>
        <img src="/images/me.png" class="h-10 w-10 mask mask-squircle border" />
        <ChevronDown16 class="w-5 h-5" />
      </button>
    </div>
  </div>
</template>

<script>
import { useStore } from 'vuex'
import LanguageSwitcher from '@/Shared/Partials/LanguageSwitcher'

const components = { LanguageSwitcher }

export default {
  name: 'ManageHeader',

  components,

  props: {
    isSidebarOpen: {
      type: Boolean,
      required: true,
      default: true,
    },
  },

  setup() {
    const store = useStore()

    const themes = [
      'light',
      'dark',
      'cupcake',
      'bumblebee',
      'emerald',
      'corporate',
      'synthwave',
      'retro',
      'cyberpunk',
      'valentine',
      'halloween',
      'garden',
      'forest',
      'aqua',
      'lofi',
      'pastel',
      'fantasy',
      'wireframe',
      'black',
      'luxury',
      'dracula',
    ]

    const setTheme = (theme) => {
      store.commit('themeSwitcher', theme)
    }

    const toggleManageSidebar = () => {
      store.commit('toggleManageSidebar')
    }

    return { themes, setTheme, toggleManageSidebar }
  },
}
</script>
