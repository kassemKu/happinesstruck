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
      v-if="isTextarea"
      :class="{ 'cursor-not-allowed': disabled }"
      :type="type"
      :placeholder="placeholder"
      :value="value"
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
    <input
      v-else
      :class="{ 'cursor-not-allowed': disabled }"
      :type="type"
      :placeholder="placeholder"
      :value="value"
      :name="name"
      @input="updateValue($event.target.value)"
      :disabled="disabled"
      ref="input"
      class="input border border-base-300 border-2 bg-transparent"
    />
    <!-- <label class="label">
      <a href="#" class="label-text-alt">Forgot username?</a>
      <a href="#" class="label-text-alt">Are you sure?</a>
    </label> -->
  </div>
</template>

<script>
export default {
  name: 'TextField',

  props: {
    isTextarea: {
      type: Boolean,
      required: false,
      default: false,
    },
    label: {
      type: String,
      default: null,
    },
    value: {
      type: String || Number || null,
      default: null,
    },
    type: {
      type: String,
      default: 'text',
      validator: (value) => ['text', 'number'].includes(value.toLowerCase()),
    },
    error: {
      type: String,
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
      this.$emit('input', value)
    },

    focus() {
      this.$refs.input.focus()
    },
  },
}
</script>
