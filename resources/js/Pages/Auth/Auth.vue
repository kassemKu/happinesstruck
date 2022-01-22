<template>
  <Head title="AUTHENTICATION" />
  <div
    class="
      htw-page htw-page__auth
      h-screen
      min-h-screen
      max-h-screen
      w-full
      max-w-screen
      min-w-screen
      bg-cover bg-center
    "
    style="background-image: url(/images/auth/Oreti.svg)"
  >
    <div class="htw-page htw-auth__container px-8 md:px-12">
      <header
        class="mtw-login__header h-36 w-full flex justify-between items-center"
      >
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
            text-lg
            md:text-xl
            text-warning
            transform
            hover:bg-transparent hover:text-info
          "
        >
          {{ $t('site_title') }}
        </Link>
        <div class="flex space-x-4">
          <LanguageSwitcher />
          <Link
            class="
              btn btn-ghost
              space-x-2
              transform
              hover:bg-transparent hover:scale-105 hover:text-info
            "
            :href="route('web.landing')"
          >
            <span class="font-medium capitalize">{{
              $t('back_to_website')
            }}</span>
            <VueFeather
              :type="$i18n.locale === 'en' ? 'arrow-right' : 'arrow-left'"
            />
          </Link>
        </div>
      </header>
      <main class="mtw-auth__content w-full flex justify-end">
        <div
          class="
            mtw-login__form-container
            w-full
            md:w-2/3
            bg-base-100
            max-w-screen-md
            rounded-box
            shadow-2xl
            mb-12
            p-8
            lg:px-16 lg:py-8
          "
        >
          <template v-if="activeAuthView === 'login'">
            <LoginFormView />
          </template>
          <template v-else>
            <RegisterFormView />
          </template>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import { Head, Link } from '@inertiajs/inertia-vue3'
import RegisterFormView from '@/Components/Auth/RegisterView'
import LoginFormView from '@/Components/Auth/LoginView'
import LanguageSwitcher from '@/Shared/Partials/LanguageSwitcher'

const components = {
  Head,
  Link,
  RegisterFormView,
  LoginFormView,
  LanguageSwitcher,
}

export default {
  name: 'Authentication',

  components,

  computed: {
    ...mapState({
      activeAuthView: (state) => state.activeAuthView,
    }),
  },
}
</script>
