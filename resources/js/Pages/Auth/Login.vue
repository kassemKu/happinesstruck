<template>
  <Head title="Log in" />

  <!-- <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <jet-validation-errors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <div>
        <jet-label for="email" value="Email" />
        <jet-input
          id="email"
          v-model="form.email"
          type="email"
          class="mt-1 block w-full"
          required
          autofocus
        />
      </div>

      <div class="mt-4">
        <jet-label for="password" value="Password" />
        <jet-input
          id="password"
          v-model="form.password"
          type="password"
          class="mt-1 block w-full"
          required
          autocomplete="current-password"
        />
      </div>

      <div class="block mt-4">
        <label class="flex items-center">
          <jet-checkbox v-model="form.remember" name="remember" />
          <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </label>
      </div>

      <div class="flex items-center justify-end mt-4">
        <Link
          v-if="canResetPassword"
          :href="route('password.request')"
          class="underline text-sm text-gray-600 hover:text-gray-900"
        >
          Forgot your password?
        </Link>

        <jet-button
          class="ml-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Log in
        </jet-button>
      </div>
    </form>
  </jet-authentication-card> -->
  <div
    class="
      htw-page htw-page__login
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
    <div class="htw-page htw-login__conatiner px-12">
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
      <main class="mtw-login__contene w-full flex justify-end">
        <div
          class="
            mtw-login__form-container
            w-1/2
            bg-base-100
            h-96
            rounded-box
            shadow-2xl
            p-8
          "
        >
          <div class="flex space-x-6">login page</div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
// import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
// import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
// import JetButton from '@/Jetstream/Button.vue'
// import JetInput from '@/Jetstream/Input.vue'
// import JetCheckbox from '@/Jetstream/Checkbox.vue'
// import JetLabel from '@/Jetstream/Label.vue'
// import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
const components = { Head, Link }

export default {
  //   components: {
  //     Head,
  //     // JetAuthenticationCard,
  //     // JetAuthenticationCardLogo,
  //     // JetButton,
  //     // JetInput,
  //     // JetCheckbox,
  //     // JetLabel,
  //     // JetValidationErrors,
  //     Link
  //   },

  components,

  props: {
    canResetPassword: Boolean,
    status: { type: String, default: null },
  },

  data() {
    return {
      form: this.$inertia.form({
        email: '',
        password: '',
        remember: false,
      }),
    }
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? 'on' : '',
        }))
        .post(this.route('login'), {
          onFinish: () => this.form.reset('password'),
        })
    },
  },
}
</script>
