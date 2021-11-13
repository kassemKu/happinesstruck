<template>
  <HtSection padding-x="0" padding-y="0">
    <div class="landing-page-section section__gallery text-neutral px-48 py-12">
      <div class="w-full flex justify-center">
        <div class="max-w-md text-center">
          <h3 class="text-2xl uppercase font-bold leading-10">our gallery</h3>
          <p class="text-neutral text-opacity-60 leading-relaxed font-medium">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit enim
            quos.
          </p>
        </div>
      </div>
      <div class="grid grid-cols-3 gap-x-8 mt-12">
        <div v-if="ourGallery[0]" class="htw-our-gallery">
          <img
            class="
              h-[30rem]
              w-full
              object-cover
              overflow-hidden
              htw-our-gallery__img
            "
            :src="ourGallery[0].src"
          />
        </div>
        <div v-if="ourGallery[1] || ourGallery[2]">
          <div class="flex flex-col space-y-4 htw-our-gallery">
            <img
              class="
                h-56
                w-full
                object-cover
                overflow-hidden
                htw-our-gallery__img
              "
              :src="ourGallery[1].src"
            />
            <img
              class="
                h-56
                w-full
                object-cover
                overflow-hidden
                htw-our-gallery__img
              "
              :src="ourGallery[2].src"
            />
          </div>
        </div>
        <div v-if="ourGallery[ourGallery.length - 1]" class="htw-our-gallery">
          <img
            class="
              h-[30rem]
              w-full
              object-cover
              overflow-hidden
              htw-our-gallery__img
            "
            :src="ourGallery[ourGallery.length - 1].src"
          />
        </div>
      </div>
      <div class="mt-16">
        <div class="w-full flex items-center space-x-4">
          <div class="w-1/3 bg-gray-600 h-px bg-opacity-10"></div>
          <Link
            :href="route('web.store')"
            class="
              flex-grow
              btn btn-info
              rounded-none rounded-tl-xl rounded-br-2xl
              text-base
            "
            >visiste our gallrey page</Link
          >
          <div class="w-1/3 bg-gray-600 h-px bg-opacity-10"></div>
        </div>
      </div>
    </div>
  </HtSection>
</template>

<script>
import HtSection from '@/Shared/Layouts/HtSection'
import { Link } from '@inertiajs/inertia-vue3'

const components = { HtSection, Link }

export default {
  name: 'LandingOurGallery',

  components,

  data() {
    return {
      ourGallery: [
        {
          name: 'clien name here',
          src: '/images/659b72077a54ad832458b88d7873792c.jpg',
        },
        {
          name: 'clien name here',
          src: '/images/659b72077a54ad832458b88d7873792c.jpg',
        },
        {
          name: 'clien name here',
          src: '/images/659b72077a54ad832458b88d7873792c.jpg',
        },
        {
          name: 'clien name here',
          src: '/images/659b72077a54ad832458b88d7873792c.jpg',
        },
      ],
    }
  },
}
</script>

<style scoped>
.htw-our-gallery > .htw-our-gallery__img {
  border-top-left-radius: 3.5rem;
  border-bottom-right-radius: 4rem;
}
</style>
