<template>
  <div class="ht-search-form flex relative">
    <Listbox v-model="selectedOption">
      <ListboxButton class="bg-gray-200 text-gray-500 hover:text-gray-800">
        <VueFeather type="filter" class="w-5 h-5" />
      </ListboxButton>
      <ListboxOptions
        as="select"
        class="
          absolute
          w-max
          bg-base-100
          z-20
          rounded-box
          top-12
          shadow-2xl
          overflow-hidden
        "
      >
        <ListboxOption
          v-for="option in options"
          :key="option"
          as="option"
          :value="option"
          class="
            h-14
            font-semibold
            text-sm
            w-full
            px-4
            cursor-pointer
            flex
            items-center
            text-gray-500
            hover:bg-base-300
          "
          :disabled="option.unavailable"
          @click="$emit('filter')"
        >
          {{ option.en_name }}
        </ListboxOption>
      </ListboxOptions>
    </Listbox>
    <input
      type="text"
      placeholder="search..."
      :value="modelValue"
      class="flex-1 input input-bordered rounded-none"
      autocomplete="off"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <button
      class="bg-gray-200 text-gray-500 hover:text-gray-800"
      @click="$emit('reset')"
    >
      <VueFeather type="slash" class="w-5 h-5" />
    </button>
  </div>
</template>

<script>
import { ref } from 'vue'
import {
  Listbox,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue'

const components = {
  Listbox,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
}

export default {
  name: 'SearchFilter',
  components,
  props: {
    modelValue: { type: String, default: null },
  },

  emits: ['update:modelValue', 'reset', 'filter'],

  setup() {
    const options = [
      { id: 1, en_name: 'Durward Reynolds', unavailable: false },
      { id: 2, en_name: 'Kenton Towne', unavailable: false },
      { id: 3, en_name: 'Therese Wunsch', unavailable: false },
      { id: 4, en_name: 'Benedict Kessler', unavailable: true },
      { id: 5, en_name: 'Katelyn Rohan', unavailable: false },
    ]
    const selectedOption = ref(options[0])
    return {
      options,
      selectedOption,
    }
  },

  data() {
    return {
      showDrop: false,
    }
  },
}
</script>

<style>
.ht-search-form :first-child {
  border-top-right-radius: 0;
  border-top-left-radius: var(--rounded-btn, 0.5rem);
  border-bottom-right-radius: 0;
  border-bottom-left-radius: var(--rounded-btn, 0.5rem);
}

.ht-search-form :last-child {
  border-top-right-radius: var(--rounded-btn, 0.5rem);
  border-top-left-radius: 0;
  border-bottom-right-radius: var(--rounded-btn, 0.5rem);
  border-bottom-left-radius: 0;
}

.ht-search-form button {
  --tw-bg-opacity: 1;
  background-color: hsla(var(--b3) / var(--tw-bg-opacity, 1));
  display: flex;
  align-items: center;
  padding-left: 1rem;
  padding-right: 1rem;
}
</style>
