<template>
  <div class="mb-8">
    <div class="form-control">
      <label class="cursor-pointer label justify-start space-x-2">
        <input
          type="checkbox"
          class="checkbox"
          :value="value"
          v-model="proxyChecked"
          :checked="checked"
        />
        <span class="label-text text-sm font-semibold capitalize">{{
          label
        }}</span>
      </label>
    </div>
    <p class="text-xs text-red-500 font-bold" v-if="error">
      {{ error }}
    </p>
  </div>
</template>

<script>
export default {
  name: 'HapCheckBox',

  emits: ['update:checked'],

  props: {
    checked: {
      type: [Array, Boolean],
      default: false,
    },
    value: {
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
