<template>
  <div class="grid grid-cols-2 h-full">
    <div class="h-full w-full bg-warning bg-opacity-40 pl-16 grid items-center">
      <div class="alert alert-warning max-w-sm shadow-inner">
        <div class="space-x-2 text-yellow-800 text-opacity-50">
          <div>
            <VueFeather type="alert-circle" />
          </div>
          <label>
            <span class="font-semibold text-sm capitalize leading-relaxed"
              >please note: this package available above 200 DK, you can choose
              more items
            </span>
            <button class="btn btn-sm btn-ghost space-x-2">
              <span>from here</span>
              <VueFeather type="arrow-right-circle" />
            </button>
          </label>
        </div>
      </div>
      <div class="flex flex-col space-y-8 -mt-96 capitalize font-medium">
        <h1 class="text-4xl font-bold max-w-sm leading-10">
          {{ name }}
        </h1>
        <p class="text-black text-opacity-40 max-w-lg leading-wide text-lg">
          {{ shortDescription }}
        </p>
        <ul
          class="
            max-w-md
            flex flex-col
            space-y-4
            text-base-content text-opacity-40
          "
        >
          <li class="flex space-x-2">
            <span><Delivery32 class="w-6 h-6" /></span>
            <span class="text-sm leading-relaxed">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum
              incidunt ullam quia?</span
            >
          </li>
          <li class="flex space-x-2">
            <span><FaceActivated32 class="w-6 h-6" /></span>
            <span class="text-sm leading-relaxed">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum
              incidunt ullam quia?</span
            >
          </li>
          <li class="flex space-x-2">
            <span><Coronavirus32 class="w-6 h-6" /></span>
            <span class="text-sm leading-relaxed">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum
              incidunt ullam quia?</span
            >
          </li>
        </ul>
        <div class="flex space-x-4 max-w-lg">
          <button class="btn">booking now</button>
        </div>
      </div>
    </div>
    <div class="h-full w-full grid grid-cols-2">
      <div
        v-for="item in items"
        :key="item"
        :class="item.blockClasses"
        class="p-8 bg-cover bg-center"
        :style="{ backgroundImage: `url(${item.src})` }"
      >
        <div
          class="
            h-full
            flex flex-col
            justify-end
            space-y-4
            capitalize
            font-medium
          "
        >
          <h3 class="text-3xl font-semibold">{{ item.name }}</h3>
          <p class="text-sm">{{ item.shortDescription }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PackagesPageFirstSlide',

  props: {
    name: {
      type: String,
      required: true,
      default: null,
    },
    shortDescription: {
      type: String,
      required: true,
      default: null,
    },
    items: {
      type: Array,
      required: true,
    },
  },
}
</script>
