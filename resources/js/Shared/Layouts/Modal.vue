<template>
  <TransitionRoot :show="isModalOpen" leave="duration-200">
    <Dialog
      class="htw-model fixed inset-0 z-40 min-h-screen"
      scroll-region
      @close="closeModal"
    >
      <div class="htw-model-content relative z-10 w-full flex justify-center">
        <TransitionChild
          as="template"
          enter="ease-out duration-300 origin-center transform transition"
          enter-from="-translate-y-4 scale-95 opacity-0"
          enter-to="translate-y-0 scale-100 opacity-100"
          leave="ease-in duration-200 transition transform opacity-100"
          leave-from="translate-y-0 scale-100 opacity-100"
          leave-to="-translate-y-4 scale-95 opacity-0"
        >
          <div
            class="
              text-gray-600
              bg-base-100
              shadow-2xl
              rounded
              border-t-4
              fixed
              top-12
              max-h-screen
              overflow-y-auto
              ht-scrollbar
            "
            :class="[
              maxWidthClass,
              `border-${type}`,
              screenHeight ? 'pb-20 pt-8 px-8' : 'p-8',
            ]"
          >
            <div class="flex flex-col space-y-8">
              <h2 class="text-lg font-semibold capitalize">
                {{ title }}
              </h2>
              <slot />
              <div class="flex justify-end space-x-4">
                <button
                  class="btn btn-sm"
                  :class="[`btn-${type}`]"
                  :disabled="disabledActionBtn ? 'disabled' : null"
                  @click="modalAction"
                >
                  {{ actionTitle }}
                </button>
                <button class="btn btn-sm btn-outline" @click="closeModal">
                  never mind
                </button>
              </div>
            </div>
          </div>
        </TransitionChild>
        <!-- Model content -->
      </div>
      <TransitionChild
        as="template"
        enter="ease-out duration-300"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="ease-in duration-200"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
        <div class="fixed inset-0 transform transition-all" @click="closeModal">
          <div class="absolute inset-0 bg-base-300 opacity-80"></div>
        </div>
      </TransitionChild>
      <!-- Overlay -->
    </Dialog>
  </TransitionRoot>
</template>

<script>
import { TransitionRoot, TransitionChild, Dialog } from '@headlessui/vue'
import { useStore, mapState } from 'vuex'

const components = { TransitionRoot, TransitionChild, Dialog }

export default {
  name: 'Modal',

  components,

  props: {
    title: {
      type: String,
      required: false,
      default: null,
    },
    actionTitle: {
      type: String,
      required: false,
      default: null,
    },
    disabledActionBtn: {
      type: Boolean,
      default: false,
      required: false,
    },
    type: {
      type: String,
      required: false,
      default: (val) => ['warning', 'error', 'info', 'success'].includes(val),
    },
    screenHeight: {
      type: Boolean,
      required: false,
      default: false,
    },
    maxWidth: {
      type: String,
      default: '2xl',
      required: false,
      validator: (value) =>
        ['sm', 'md', 'lg', 'xl', '2xl', 'screen-sm', 'screen-lg'].includes(
          value,
        ),
    },
  },

  emits: ['modalAction'],

  setup(_, { emit }) {
    const store = useStore()

    const closeModal = () => {
      store.commit('closeModal')
    }

    const modalAction = () => {
      emit('modalAction')
    }

    return { closeModal, modalAction }
  },

  computed: {
    ...mapState({
      isModalOpen: (state) => state.isModalOpen,
    }),

    maxWidthClass() {
      return {
        sm: 'sm:max-w-sm',
        md: 'sm:max-w-md',
        lg: 'sm:max-w-lg',
        xl: 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl',
        'screen-sm': 'max-w-screen-sm',
        'screen-lg': 'max-w-screen-lg',
      }[this.maxWidth]
    },
  },
}
</script>
