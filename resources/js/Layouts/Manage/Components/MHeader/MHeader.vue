<template>
  <div
    class="
      htm-header-container
      bg-base-300 bg-opacity-40
      h-16
      flex
      fixed
      inset-0
      w-full
      items-center
      justify-between
      shadow-xl
    "
    :class="$i18n.locale === 'ar' ? 'pr-80' : 'pl-80'"
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
    >
      <ArrowLeft20 />
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
                {{ theme }}
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
        <span class="font-bold">fulll name</span>
        <img src="/images/me.png" class="h-10 w-10 mask mask-squircle border" />
        <ChevronDown16 class="w-5 h-5" />
      </button>
    </div>
  </div>
</template>

<script>
import LanguageSwitcher from '@/Shared/Partials/LanguageSwitcher'

const components = { LanguageSwitcher }

export default {
  name: 'ManageHeader',

  components,

  setup() {
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
      const htmlTag = document.querySelector('html')

      htmlTag.setAttribute('data-theme', theme)
    }

    return { themes, setTheme }
  },
}
</script>
