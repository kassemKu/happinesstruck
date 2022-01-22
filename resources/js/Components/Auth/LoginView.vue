<template>
  <AuthTransition :active-auth-view="activeAuthView === 'login'">
    <form @submit.prevent="login">
      <TextField
        v-model="form.email"
        name="email"
        :placeholder="$t('email')"
        :label="$t('email')"
        :server-error="$page.props.errors.email"
      />
      <TextField
        v-model="form.password"
        name="password"
        :type="'password'"
        :placeholder="$t('password')"
        :label="$t('password')"
        :server-error="$page.props.errors.password"
      />
      <button type="submit" class="btn btn-info btn-block mt-4 text-lg">
        login
      </button>
    </form>
    <Link
      :href="route('password.request')"
      class="underline text-sm text-gray-600 hover:text-gray-900"
    >
      Forgot your password?
    </Link>
  </AuthTransition>
</template>

<script>
import { mapState } from 'vuex'
import { Link } from '@inertiajs/inertia-vue3'
import AuthTransition from './AuthTransition'
import TextField from '@/Shared/UI/TextField'

const components = { AuthTransition, TextField, Link }

export default {
  name: 'LoginFormView',

  components,

  props: {
    // TODO::TO USE PROPS
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

  computed: {
    ...mapState({
      activeAuthView: (state) => state.activeAuthView,
    }),
  },

  methods: {
    login() {
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
