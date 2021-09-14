<template>
  <form
    @submit.prevent="submitted"
    class="
      htm-manage-action-form
      px-12
      py-8
      max-w-3xl
      mx-auto
      bg-base-100
      rounded-box
      shadow-2xl
    "
    :class="maxWidthClass"
  >
    <fieldset class="htm-manage-action-fieddest">
      <legend
        class="
          htm-manage-action-legend
          text-2xl
          uppercase
          font-bold
          mb-4
          text-center
        "
      >
        {{ formTitle }}
      </legend>
      <slot />
      <button
        class="btn btn-block btn-info font-bold tracking-wider"
        type="submit"
      >
        {{ btnTitle }}
      </button>
    </fieldset>
  </form>
</template>

<script>
export default {
  name: 'ManageForm',

  props: {
    formTitle: {
      type: String,
      required: false,
    },
    btnTitle: {
      type: String,
      default: null,
      required: true,
    },
    maxWidth: {
      type: String,
      required: false,
      validator: (val) =>
        [
          'sm',
          'md',
          'lg',
          'xl',
          '2xl',
          '3xl',
          '4xl',
          '5xl',
          '6xl',
          '6xl',
          '7xl',
          'full',
        ].includes(val.toLowerCase()),
      default: '2xl',
    },
  },

  computed: {
    maxWidthClass() {
      return {
        sm: 'sm:max-w-sm',
        md: 'sm:max-w-md',
        lg: 'sm:max-w-lg',
        xl: 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl',
        '3xl': 'sm:max-w-3xl',
        '4xl': 'sm:max-w-4xl',
        '5xl': 'sm:max-w-5xl',
        '6xl': 'sm:max-w-6xl',
        '7xl': 'sm:max-w-7xl',
      }[this.maxWidth]
    },
  },

  methods: {
    submitted() {
      this.$emit('formSubmited')
    },
  },
}
</script>
