<template>
  <div class="ht-language-switcher">
    <button
      v-if="getLocale === 'en'"
      class="
        btn btn-ghost
        text-base-content
        transform
        font-body-arabic
        hover:bg-transparent hover:scale-105 hover:text-info
      "
      @click.prevent="setLocale('ar')"
    >
      العربية
    </button>
    <button
      v-else
      class="
        btn btn-ghost
        text-base-content
        transform
        font-sans
        capitalize
        hover:bg-transparent hover:scale-105 hover:text-info
      "
      @click.prevent="setLocale('en')"
    >
      english
    </button>
  </div>
</template>

<script>
export default {
  name: 'LanguageSwitcher',

  computed: {
    getLocale() {
      let locale = this.$i18n.locale
      if (locale === 'ar') {
        document.querySelector('html').setAttribute('lang', 'ar')
        document.querySelector('body').setAttribute('dir', 'rtl')
      } else {
        document.querySelector('html').setAttribute('lang', 'en')
        document.querySelector('body').setAttribute('dir', 'ltr')
      }
      return locale
    },
  },

  methods: {
    setLocale(locale) {
      this.$cookie.setCookie('locale', locale)
      this.$cookie.setCookie('lang', locale)
      import(`../../locales/${locale}.json`).then((msgs) => {
        this.$i18n.setLocaleMessage(locale, msgs)
        this.$i18n.locale = locale
      })
    },
  },
}
</script>
