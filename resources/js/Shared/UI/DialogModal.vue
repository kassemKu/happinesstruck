<template>
  <modal
    :show="show"
    :max-width="maxWidth"
    :closeable="closeable"
    @close="close"
  >
    <div class="px-6 py-4">
      <h4
        class="text-lg uppercase font-semibold"
        :class="{ 'text-error': modalType === 'error' }"
      >
        <slot name="title"> </slot>
      </h4>

      <div class="mt-4">
        <slot name="content"> </slot>
      </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 w-full flex justify-end">
      <slot name="footer"> </slot>
    </div>
  </modal>
</template>

<script>
import Modal from '@/Shared/UI/Modal'

export default {
  name: 'DialogModal',

  components: {
    Modal,
  },

  props: {
    show: {
      type: Boolean,
      default: false,
    },
    maxWidth: {
      type: String,
      default: '2xl',
    },
    closeable: {
      type: Boolean,
      default: true,
    },
    modalType: {
      type: String,
      required: false,
      default: 'error',
      validator: (value) => ['error', 'info', 'success'].includes(value),
    },
  },

  emits: ['close'],

  methods: {
    close() {
      this.$emit('close')
    },
  },
}
</script>
