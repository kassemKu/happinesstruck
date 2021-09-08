<template>
  <div class="form-control mb-8">
    <label class="label">
      <span class="label-text capitalize font-semibold">{{ label }}</span>
      <span
        v-if="optional"
        class="label-text-alt text-xs uppercase font-bold text-green-500"
        >(optional)</span
      >
    </label>
    <textarea
      :class="{ 'cursor-not-allowed': disabled }"
      :type="type"
      :placeholder="placeholder"
      :value="modelValue"
      :name="name"
      @input="updateValue($event.target.value)"
      :disabled="disabled"
      ref="input"
      class="
        textarea
        h-24
        textarea-bordered
        border-base-300 border-2
        bg-transparent
      "
    ></textarea>
    <label class="label">
      <span v-show="serverError" class="label-text-alt text-error">{{
        serverError
      }}</span>
      <!-- <a href="#" class="label-text-alt">Are you sure?</a> -->
    </label>
  </div>
</template>

<script>
export default {
  name: 'HTextarea',

  props: {
    label: {
      type: String,
      default: null,
    },
    modelValue: {
      type: String || Number || null,
      default: null,
    },
    type: {
      type: String,
      default: 'text',
      validator: (value) => ['text', 'number'].includes(value.toLowerCase()),
    },
    serverError: {
      type: String,
      required: false,
      default: null,
    },
    name: {
      type: String,
      default: null,
    },
    placeholder: {
      type: String,
      default: null,
    },
    disabled: {
      type: Boolean,
      default: false,
    },
    optional: {
      type: Boolean,
      default: false,
    },
  },

  methods: {
    updateValue(value) {
      this.$emit('update:modelValue', value)
    },

    focus() {
      this.$refs.input.focus()
    },
  },
}
</script>
