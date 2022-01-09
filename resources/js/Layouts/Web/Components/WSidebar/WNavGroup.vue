<template>
  <nav class="flex flex-col space-y-2 border-b">
    <h4 class="text-gray-400 uppercase px-6 font-semibold">
      {{ title }}
    </h4>
    <ul class="flex flex-col">
      <slot />
      <!-- <li v-for="(index, link) in links" :key="index">
        <button
          type="button"
          class="
            w-full
            h-14
            flex
            items-center
            space-x-2
            px-6
            border-l-4 border-transparent
            transition
            ease-in-out
            duration-200
            hover:bg-info
            hover:bg-opacity-10
            hover:border-info
            hover:border-opacity-60
            hover:text-info
          "
          @click="navigateTo(link.route)"
        >
          <span v-html="link.icon"></span>
          <span class="capitalize font-medium">{{ link.name }}</span>
        </button>
      </li> -->
      <!-- <li>
        <button
          type="button"
          class="
            w-full
            h-14
            flex
            items-center
            space-x-2
            px-6
            border-l-4 border-transparent
            transition
            ease-in-out
            duration-200
            hover:bg-info
            hover:bg-opacity-10
            hover:border-info
            hover:border-opacity-60
            hover:text-info
          "
          @click="navigateTo('web.store')"
        >
          <Store32 class="w-6 h-6" />
          <span class="capitalize font-medium">{{ $t('our_store') }}</span>
        </button>
      </li>
      <li>
        <button
          type="button"
          class="
            w-full
            h-14
            flex
            items-center
            space-x-2
            px-6
            border-l-4 border-transparent
            transition
            ease-in-out
            duration-200
            hover:bg-info
            hover:bg-opacity-10
            hover:border-info
            hover:border-opacity-60
            hover:text-info
          "
          @click="navigateTo('web.collections')"
        >
          <Delivery32 class="w-6 h-6" />
          <span class="capitalize font-medium">{{ $t('collections') }}</span>
        </button>
      </li>
      <li>
        <button
          type="button"
          class="
            w-full
            h-14
            flex
            items-center
            space-x-2
            px-6
            border-l-4 border-transparent
            transition
            ease-in-out
            duration-200
            hover:bg-info
            hover:bg-opacity-10
            hover:border-info
            hover:border-opacity-60
            hover:text-info
          "
          @click="navigateTo('web.packages')"
        >
          <DeliveryParcel24 class="w-6 h-6" />
          <span class="capitalize font-medium">{{ $t('our_packages') }}</span>
        </button>
      </li> -->
    </ul>
  </nav>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'WebSidebarNavGroup',
  props: {
    title: {
      type: String,
      default: null,
      required: true,
    },
  },
})
</script>
