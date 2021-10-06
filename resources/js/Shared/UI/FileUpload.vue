<template>
  <div
    class="
      py-4
      rounded-box
      border-2 border-base-300 border-dashed
      mb-8
      hover:border-info
      w-full
      h-full
      transition
      ht-base-transition
    "
  >
    <input
      ref="picker"
      type="file"
      accept="image/*"
      class="hidden"
      multiple
      @change="change"
    />
    <button
      type="button"
      class="
        btn btn-ghost
        w-full
        h-full
        space-x-2
        flex-col
        text-gray-400
        hover:bg-transparent hover:text-info
      "
      @click="browse"
    >
      <VueFeather type="upload-cloud" class="w-8 h-8" />
      <span class="block">click to upload file/s</span>
    </button>
  </div>
</template>

<script>
export default {
  name: 'FileUpload',

  emits: ['input'],
  methods: {
    browse() {
      this.$refs.picker.click()
    },
    change(e) {
      this.$emit('input', e.target.files)
    },
  },
}
</script>
