<template>
  <TransitionRoot
    :show="activeAuthView"
    enter="transform transition ease-in-out"
    enter-from="-translate-x-full"
    enter-to="translate-x-0"
  >
    <div>
      <div class="flex space-x-4 items-center">
        <button
          class="btn btn-info"
          :disabled="activeView === 'login' ? 'disabled' : null"
          @click="setAuthView('login')"
        >
          login
        </button>
        <button
          class="btn btn-info"
          :disabled="activeView === 'register' ? 'disabled' : null"
          @click="setAuthView('register')"
        >
          create new account
        </button>
      </div>
      <div class="mt-8">
        <slot />
      </div>
    </div>
  </TransitionRoot>
</template>

<script>
import { useStore } from 'vuex'
import { TransitionRoot } from '@headlessui/vue'

const components = { TransitionRoot }

export default {
  name: 'AuthTransition',

  components,

  props: {
    activeAuthView: {
      type: Boolean,
      default: false,
      required: true,
    },
  },

  setup() {
    const store = useStore()

    const activeView = store.state.activeAuthView

    const setAuthView = (view) => {
      store.commit('setActiveAuthView', view)
    }

    return { setAuthView, activeView }
  },
}
</script>
