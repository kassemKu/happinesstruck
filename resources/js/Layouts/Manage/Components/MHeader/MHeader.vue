<template>
  <div
    class="
      htm-header
      ht-base-transition
      bg-base-300 bg-opacity-40
      h-16
      flex
      fixed
      inset-0
      z-10
      w-full
      items-center
      justify-between
      shadow-md
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
        hover:scale-110
        hover:shadow
      "
      type="button"
      @click.prevent="toggleManageSidebar"
    >
      <VueFeather :type="arrowDirection" />
    </button>
    <div class="flex items-center space-x-2 htm-header__user-area">
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
      <div class="bg-base-100">
        <UserAreaDropdown />
      </div>
    </div>
  </div>
</template>

<script>
import { useStore } from 'vuex'
import LanguageSwitcher from '@/Shared/Partials/LanguageSwitcher'
import UserAreaDropdown from '@/Shared/UI/UserAreaDropdown'

const components = { LanguageSwitcher, UserAreaDropdown }

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

  computed: {
    arrowDirection() {
      if (this.$i18n.locale !== 'ar') {
        if (!this.isSidebarOpen) {
          return 'arrow-right'
        } else {
          return 'arrow-left'
        }
      }
      if (this.$i18n.locale === 'ar') {
        if (!this.isSidebarOpen) {
          return 'arrow-left'
        }
      }
      return 'arrow-right'
    },
  },
}
</script>
