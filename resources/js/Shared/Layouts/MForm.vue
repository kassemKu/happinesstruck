<template>
  <form
    @submit.prevent="submitted"
    class="
      htm-manage-action-form
      px-12
      py-8
      max-w-2xl
      mx-auto
      bg-base-100
      rounded-box
      shadow-2xl
    "
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
  },

  methods: {
    submitted() {
      this.$emit('formSubmited')
    },
  },
}
</script>
