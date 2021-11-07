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
              w-1/2
              p-8
              rounded
              border-t-4 border-red-500
              fixed
              top-12
            "
            :class="maxWidthClass"
          >
            <div class="flex flex-col space-y-4">
              <h2 class="text-lg font-semibold capitalize">
                here confirm title
              </h2>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Recusandae temporibus quo impedit?
              </p>
              <div class="flex justify-end space-x-4">
                <button class="btn btn-sm btn-error" @click="modalAction">
                  delete product
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
    maxWidth: {
      type: String,
      default: '2xl',
      required: false,
      validator: (value) => ['sm', 'md', 'lg', 'xl', '2xl'].includes(value),
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
      }[this.maxWidth]
    },
  },
}
</script>
