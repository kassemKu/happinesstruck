<template>
  <HtSection padding-x="0" padding-y="0">
    <div
      class="
        landing-page-section
        section__blog
        capitalize
        flex flex-col
        space-y-12
        px-24
        py-12
        text-neutral
      "
    >
      <div class="max-w-md">
        <h3 class="text-2xl uppercase font-bold leading-10">
          {{ $t('recent_blog') }}
        </h3>
        <p class="text-neutral text-opacity-60 leading-relaxed font-medium">
          {{ $t('lorem_11') }}
        </p>
      </div>
      <div class="grid grid-cols-3 gap-x-20">
        <div
          v-for="(post, index) in blog"
          :key="index"
          class="htw-landing__recent-blog bg-white shadow-lg overflow-hidden"
        >
          <img
            class="h-64 w-full object-cover overflow-hidden"
            :src="post.src"
          />

          <div class="ltr:p-4 rtl:px-6 rtl:py-4">
            <p class="font-semibold text-lg capitalize leading-8">
              {{ $t('post_title') }}
            </p>
            <p
              class="
                font-medium
                text-xs text-neutral text-opacity-60
                leading-5
                max-w-sm
              "
            >
              {{ $t('lorem_11') }}
            </p>
          </div>
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
  name: 'LandingRecentBlog',

  components,

  data() {
    return {
      blog: [
        {
          title: 'first product',
          src: '/images/products/product_11.jpg',
          contentPrefic:
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, magni assumenda possimus a eaque eveniet...',
        },
        {
          title: 'first product',
          src: '/images/products/product_22.jpg',
          contentPrefic:
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, magni assumenda possimus a eaque eveniet...',
        },
        {
          title: 'first product',
          src: '/images/products/product_24.png',
          contentPrefic:
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, magni assumenda possimus a eaque eveniet...',
        },
      ],
    }
  },
}
</script>

<style scoped>
.htw-landing__recent-blog,
.htw-landing__recent-blog > img {
  border-top-left-radius: 2.5rem;
  border-bottom-right-radius: 4rem;
}
</style>
