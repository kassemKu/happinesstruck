<template>
  <AuthTransition :active-auth-view="activeAuthView === 'register'">
    <form @submit.prevent="register">
      <TextField
        v-model="form.full_name"
        name="full_name"
        :placeholder="'full name'"
        :label="'full name'"
        :server-error="$page.props.errors.ar_name"
      />
      <TextField
        v-model="form.email"
        name="email"
        :type="'email'"
        :placeholder="'email'"
        :label="'email'"
        :server-error="$page.props.errors.email"
      />
      <TextField
        v-model="form.mobile"
        name="mobile"
        :type="'phone'"
        :placeholder="'mobile'"
        :label="'mobile'"
        :server-error="$page.props.errors.mobile"
      />
      <TextField
        v-model="form.password"
        name="password"
        :type="'password'"
        :placeholder="'password'"
        :label="'password'"
        :server-error="$page.props.errors.password"
      />
      <TextField
        v-model="form.password_confirmation"
        name="password_confirmation"
        :type="'password'"
        :placeholder="'confirm your password'"
        :label="'confirm your password'"
        :server-error="$page.props.errors.password_confirmation"
      />
      <button type="submit" class="btn btn-info btn-block mt-4 text-lg">
        create account
      </button>
    </form>
  </AuthTransition>
</template>

<script>
import { mapState } from 'vuex'
import AuthTransition from './AuthTransition'
import TextField from '@/Shared/UI/TextField'

const components = { AuthTransition, TextField }

export default {
  name: 'RgisterFormView',

  components,

  data() {
    return {
      form: this.$inertia.form({
        full_name: '',
        email: '',
        mobile: '',
        password: '',
        password_confirmation: '',
        terms: false,
      }),
    }
  },

  computed: {
    ...mapState({
      activeAuthView: (state) => state.activeAuthView,
    }),
  },

  methods: {
    register() {
      this.form.post(this.route('register'), {
        onFinish: () => this.form.reset('password', 'password_confirmation'),
      })
    },
  },
}
</script>
