<template>
  <HtSection padding-x="12">
    <div class="htw-slider htw-package-slider bg-base-100 min-h-screen">
      <div
        v-for="(slide, index) in slides"
        :key="index"
        class="
          htw-slide htw-package-slide
          relative
          w-full
          h-screen
          flex flex-col
          justify-between
          px-6
          pt-36
        "
      >
        <div class="flex items-center">
          <div class="w-5/12 h-full flex items-center">
            <div class="flex flex-col space-y-6">
              <div class="tracking-wider capitalize font-bold">
                <span class="capitalize text-yellow-800 text-sm">{{
                  slide.subTitle
                }}</span>
                <h1 class="text-4xl">
                  {{ slide.title }}
                </h1>
              </div>
              <div class="max-w-md">
                <p class="text-gray-400 font-medium">
                  {{ slide.shortDescription }}
                </p>
              </div>
              <div class="flex space-x-4">
                <button
                  class="
                    btn btn-outline
                    border-warning border-2
                    rounded-full
                    text-warning
                    hover:bg-warning
                    hover:text-base-100
                    hover:border-warning
                    hover:border-none
                  "
                >
                  book this package
                </button>
                <button
                  class="
                    btn btn-info
                    rounded-full
                    hover:bg-transparent
                    hover:text-info
                    hover:border-info
                    hover:border-2
                  "
                >
                  book this package
                </button>
              </div>
            </div>
          </div>
          <!-- title, description, buttons -->
          <div class="flex-1 flex flex-col space-y-12">
            <div
              class="htw-package-slide__img-wrap relative h-[635px] transform"
            >
              <div
                v-for="(img, i) in slide.images"
                :key="i"
                class="
                  htw-package-slide__img-container
                  h-72
                  w-48
                  absolute
                  transform
                  cursor-pointer
                  transition
                  rotate-3
                  hover:scale-110 hover:rotate-0
                  duration-200
                "
              >
                <img
                  :src="img"
                  alt="happiness truck"
                  class="
                    htw-package-slide__img
                    object-cover
                    w-full
                    h-full
                    rounded rounded-tl-3xl
                    shadow-2xl
                  "
                />
              </div>
            </div>
            <div class="flex items-center space-x-2">
              <button
                class="
                  btn btn-circle
                  bg-warning
                  border-warning
                  transform
                  hover:bg-transparent
                  hover:border-1
                  hover:border-warning
                  hover:text-warning
                  hover:border-2
                  hover:scale-105
                "
              >
                <VueFeather type="chevron-right" stroke-width="3" />
              </button>
              <progress
                class="progress progress-warning w-56"
                value="10"
                max="100"
              ></progress>
            </div>
            <!-- arrow -->
          </div>
          <!-- images, arrow -->
        </div>
        <div
          class="
            slider-footer
            h-64
            relative
            w-full
            text-base-200
            bg-warning
            rounded-tl-3xl
            bottom-0
            flex
            overflow-hidden
          "
        >
          <div class="bg-yellow-800 py-8 flex items-center">
            <div class="px-4">
              <h1 class="text-5xl uppercase font-black">0 1</h1>
            </div>
            <div class="h-full w-[1px] bg-base-200 mr-4"></div>
            <div class="max-w-sm">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Dignissimos vel voluptates eveniet voluptatum!
              </p>
            </div>
          </div>
          <div class="flex-1 flex items-center px-4">
            <ul class="grid grid-cols-2 gap-6">
              <li class="flex items-center space-x-2">
                <span class="inline-block">
                  <VueFeather
                    type="bookmark"
                    stroke-width="2.5"
                    class="w-8 h-8"
                /></span>
                <span class="inline-block text-sm max-w-sm font-medium flex-1"
                  >Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Deleniti adipisci dolor ut!</span
                >
              </li>
              <li class="flex items-center space-x-2">
                <span class="inline-block">
                  <VueFeather
                    type="bookmark"
                    stroke-width="2.5"
                    class="w-8 h-8"
                /></span>
                <span class="inline-block text-sm max-w-sm font-medium flex-1"
                  >Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Deleniti adipisci dolor ut!</span
                >
              </li>
              <li class="flex items-center space-x-2">
                <span class="inline-block">
                  <VueFeather
                    type="bookmark"
                    stroke-width="2.5"
                    class="w-8 h-8"
                /></span>
                <span class="inline-block text-sm max-w-sm font-medium flex-1"
                  >Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Deleniti adipisci dolor ut!</span
                >
              </li>
              <li class="flex items-center space-x-2">
                <span class="inline-block">
                  <VueFeather
                    type="bookmark"
                    stroke-width="2.5"
                    class="w-8 h-8"
                /></span>
                <span class="inline-block text-sm max-w-sm font-medium flex-1"
                  >Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Deleniti adipisci dolor ut!</span
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </HtSection>
</template>

<script>
import HtSection from '@/Shared/Layouts/HtSection.vue'

const components = { HtSection }

export default {
  name: 'Slider',

  components,

  data() {
    return {
      slides: [
        {
          subTitle: 'red title',
          title: 'our pakage name',
          shortDescription:
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi tempora hic ullam aliquam enim quas, cum aliquid officiis quasi sit quaerat nulla, quidem, voluptatibus explicabo accusantium praesentium quo? Cumque, animi?',
          images: [
            '/images/659b72077a54ad832458b88d7873792c.jpg',
            '/images/AZhu69ap-image-1-6.jpg',
            '/images/products/product_23.jpg',
            '/images/AZhu69ap-image-1-6.jpg',
            '/images/products/product_23.jpg',
          ],
          items: [
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
          ],
        },
      ],
    }
  },
}
</script>

<style>
.htw-package-slide__img-container {
  transition-timing-function: cubic-bezier(0.65, 0.05, 0.36, 1);
}
.htw-package-slide__img-container:first-child {
  top: 0;
  right: 0;
}
.htw-package-slide__img-container:nth-child(2) {
  top: 0;
  left: 0;
}
.htw-package-slide__img-container:nth-child(3) {
  bottom: 0;
  left: 0;
}
.htw-package-slide__img-container:nth-child(4) {
  bottom: 0;
  right: 0;
}
.htw-package-slide__img-container:nth-child(5) {
  top: 14%;
  left: 32%;
  height: 32rem;
  width: 16rem;
}
.slider-footer {
  margin-left: calc(4rem + 8px);
}
</style>
