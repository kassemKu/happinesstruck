<template>
  <div
    class="
      htw-packages-page__slide-2
      h-full
      w-full
      bg-cover bg-center
      text-base-200
    "
    :style="{ backgroundImage: `url(${src})` }"
  >
    <div class="h-full w-full pl-16 grid items-center">
      <div class="alert max-w-sm shadow-inner">
        <div class="space-x-2">
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
        <p class="max-w-lg leading-wide text-lg">
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
  </div>
</template>

<script>
export default {
  name: 'PackagesPageSecondSlide',

  props: {
    name: {
      type: String,
      required: true,
      default: null,
    },
    shortDescription: {
      type: String,
      required: true,
      default: '',
    },
    src: {
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
