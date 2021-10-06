<template>
  <div class="w-full h-12 bg-white flex items-center justify-between rounded">
    <div>
      <button
        class="
          w-12
          h-12
          flex
          items-center
          justify-center
          bg-gray-200
          text-gray-500
          hover:text-gray-800
        "
        @click="showDrop = true"
      >
        <VueFeather type="filter" class="w-5 h-5" />
      </button>
      <div v-if="showDrop">
        <div
          class="fixed inset-0 z-40 bg-black bg-opacity-25"
          @click="showDrop = false"
        />
        <div class="w-3xl bg-white absolute p-8 z-50 rounded shadow-lg">
          <slot />
        </div>
      </div>
    </div>
    <div class="flex-grow">
      <input
        class="
          appearance-none
          h-12
          px-4
          block
          w-full
          text-gray-700
          border-2 border-gray-200
          leading-tight
          hover:border-gray-400
        "
        type="text"
        placeholder="search..."
        autocomplete="off"
        name="search"
        :value="value"
        @input="$emit('input', $event.target.value)"
      />
    </div>
    <div>
      <button
        class="
          w-12
          h-12
          flex
          items-center
          justify-center
          bg-gray-200
          text-gray-500
          hover:text-gray-800
        "
        type="button"
        @click.stop="$emit('reset')"
      >
        <VueFeather type="slash" class="w-5 h-5" />
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SearchFilter',

  props: {
    value: { type: String, default: null },
  },

  emits: ['reset', 'input'],

  data() {
    return {
      showDrop: false,
    }
  },
}
</script>
