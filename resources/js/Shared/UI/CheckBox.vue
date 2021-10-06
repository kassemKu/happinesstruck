<template>
  <div class="mb-8">
    <div class="form-control">
      <label class="cursor-pointer label justify-start space-x-2">
        <input
          v-model="proxyChecked"
          type="checkbox"
          class="checkbox"
          :value="value"
          :checked="checked"
        />
        <span class="label-text text-sm font-semibold capitalize">{{
          label
        }}</span>
      </label>
    </div>
    <p v-if="error" class="text-xs text-red-500 font-bold">
      {{ error }}
    </p>
  </div>
</template>

<script>
export default {
  name: 'HapCheckBox',

  props: {
    checked: {
      type: [Array, Boolean],
      default: false,
    },
    value: {
      type: [String, Boolean, Number],
      default: null,
    },
    label: {
      type: String,
      required: false,
      default: null,
    },
    error: {
      type: String,
      required: false,
      default: null,
    },
  },

  emits: ['update:checked'],

  computed: {
    proxyChecked: {
      get() {
        return this.checked
      },
      set(val) {
        this.$emit('update:checked', val)
      },
    },
  },
}
</script>
