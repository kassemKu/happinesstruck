<template>
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
              <span class="capitalize text-error text-sm">{{
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
        <div class="flex-1 flex flex-col space-y-20">
          <div
            class="
              htw-package-slide__img-wrap
              relative
              h-[535px]
              transform
              rotate-3
            "
          >
            <div
              v-for="(img, i) in slide.images"
              :key="i"
              class="w-full htw-package-slide__img-container h-64 w-48 absolute"
            >
              <img
                :src="img"
                alt="happiness truck"
                class="
                  htw-package-slide__img
                  object-cover
                  w-full
                  h-full
                  rounded-lg rounded-tl-3xl rounded-bl
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
                hover:bg-transparent
                hover:border-2
                hover:border-warning
                hover:text-warning
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
          <!-- arrows -->
        </div>
        <!-- images, arrows -->
      </div>
      <div
        class="
          h-64
          relative
          w-full
          bg-warning
          rounded-tl-2xl
          bottom-0
          -right-16
        "
      ></div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Slider',

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
.htw-package-slide__img-container:first-child {
  top: 0;
  right: 0;
}
.htw-package-slide__img-container:nth-child(2) {
  top: 10%;
  left: 0;
}
.htw-package-slide__img-container:nth-child(3) {
  bottom: -10%;
  left: 0;
}
.htw-package-slide__img-container:nth-child(4) {
  bottom: 0;
  right: 0;
}
.htw-package-slide__img-container:nth-child(5) {
  top: 14%;
  left: 33%;
  height: 29rem;
  width: 15rem;
}
</style>
