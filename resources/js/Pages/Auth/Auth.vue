<template>
  <Head title="AUTHENTICATION" />
  <div
    class="
      htw-page htw-page__auth
      h-screen
      min-h-screen
      max-h-screen
      w-screen
      max-w-screen
      min-w-screen
      bg-cover bg-center
    "
    style="background-image: url(/images/auth/Oreti.svg)"
  >
    <div class="htw-page htw-auth__conatiner px-12">
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
            text-xl text-warning
            transform
            hover:bg-transparent hover:text-info
          "
        >
          <span>happiness</span>
          <span>truck</span>
        </Link>
        <Link
          class="
            btn btn-ghost
            space-x-2
            transform
            hover:bg-transparent hover:scale-105 hover:text-info
          "
          :href="route('web.landing')"
        >
          <span class="font-medium capitalize">back to website</span>
          <VueFeather type="arrow-right" />
        </Link>
      </header>
      <main class="mtw-auth__contene w-full flex justify-end">
        <div
          class="
            mtw-login__form-container
            w-1/2
            bg-base-100
            rounded-box
            shadow-2xl
            px-16
            py-8
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

const components = { Head, Link, RegisterFormView, LoginFormView }

export default {
  name: 'Authentiction',

  components,

  computed: {
    ...mapState({
      activeAuthView: (state) => state.activeAuthView,
    }),
  },
}
</script>
