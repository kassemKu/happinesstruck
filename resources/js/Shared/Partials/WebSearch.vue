<template>
  <button
    class="
      btn btn-ghost
      transform
      hover:bg-transparent hover:text-info hover:scale-110
      focus:outline-none
    "
    v-bind="$attrs"
    @click="isSearchOpen = true"
  >
    <VueFeather type="search" />
  </button>
  <TransitionRoot :show="isSearchOpen" as="template">
    <Dialog
      class="fixed inset-0 z-50 flex justify-center items-start"
      :open="isSearchOpen"
      @close="isSearchOpen = false"
    >
      <TransitionChild
        as="template"
        enter="duration-200 ease-out"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="duration-200 ease-in"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
        <DialogOverlay class="fixed inset-0 bg-slate-900 bg-opacity-60" />
      </TransitionChild>
      <TransitionChild
        as="template"
        enter="duration-200 ease-out"
        enter-from="opacity-0 scale-95"
        enter-to="opacity-100 scale-100"
        leave="duration-200 ease-in"
        leave-from="opacity-100  scale-100"
        leave-to="opacity-0 "
      >
        <div
          class="
            w-full
            max-w-2xl
            bg-slate-50
            rounded-box
            overflow-hidden
            mx-4
            max-h-[80vh]
            mt-[10vh]
            relative
          "
        >
          <div class="flex items-center relative">
            <div
              class="
                absolute
                inset-y-0
                ltr:left-0
                rtl:right-0
                flex
                items-center
                ltr:pl-4
                rtl:pr-4
                pointer-events-none
              "
            >
              <VueFeather type="search" />
            </div>
            <input
              class="
                w-full
                py-4
                ltr:pl-12
                rtl:pr-12
                border-b border-gray-100
                outline-none
                placeholder-gray-400
              "
              type="text"
              :placeholder="$t('search.')"
              @input="(e) => search(e.target.value)"
            />
            <div
              class="
                absolute
                inset-y-0
                ltr:right-0
                rtl:left-0
                flex
                items-center
                ltr:pr-4
                rtl:pl-4
              "
            >
              <button
                class="
                  flex
                  items-center
                  p-1.5
                  uppercase
                  font-semibold
                  text-xs
                  focus:outline-none
                "
                type="button"
                @click="isSearchOpen = false"
              >
                <kbd class="kbd">esc</kbd>
              </button>
            </div>
          </div>
          <ul class="menu">
            <li v-for="item in result" :key="item.id">
              <Link :href="route('web.showProduct', item.id)" class="space-x-2">
                <img
                  v-if="item.media && item.media.length > 0"
                  class="h-12 w-12 rounded-full object-cover"
                  :src="item.media[0].full_url"
                  :alt="$i18n.locale === 'ar' ? item.ar_name : item.en_name"
                />
                <span>{{
                  $i18n.locale === 'ar' ? item.ar_name : item.en_name
                }}</span></Link
              >
            </li>
          </ul>
        </div>
      </TransitionChild>
    </Dialog></TransitionRoot
  >
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import axios from 'axios'
import debounce from 'lodash/debounce'
import {
  Dialog,
  DialogOverlay,
  TransitionRoot,
  TransitionChild,
} from '@headlessui/vue'

const components = {
  Dialog,
  DialogOverlay,
  TransitionRoot,
  TransitionChild,
  Link,
}

export default {
  name: 'WebSearch',
  components,
  setup() {
    const isSearchOpen = ref(false)
    const onKeyDown = (e) => {
      if (isSearchOpen.value) return

      if (e.metaKey || (e.ctrlKey && e.key === 'k')) {
        isSearchOpen.value = true
      }
    }

    onMounted(() => window.addEventListener('keydown', onKeyDown))

    onUnmounted(() => window.removeEventListener('keydown', onKeyDown))

    const result = ref([])

    const search = debounce(async (e) => {
      if (e.length > 2) {
        await axios.post(route('web.search', e)).then((res) => {
          const { data } = res.data
          console.log(data)
          if (data.data.length > 0) {
            result.value = data.data
          }
        })
      }
    }, 250)

    return { isSearchOpen, search, result }
  },
}
</script>
