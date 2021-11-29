<template>
  <WebLayout>
    <Head title="OUR-COLLECTION">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__collection mt-36">
      <HtSection>
        <h2 class="text-2xl capitalize font-semibold">
          our packages collections
        </h2>
      </HtSection>
      <HtSection>
        <div
          v-for="collection in collections"
          :key="collection.id"
          class="min-h-screen"
        >
          <h1 class="text-center text-2xl font-bold uppercase">
            {{ collection.en_name }}
            <span class="text-warning font-bold text-2xl"
              >{{ collection.min_price_per_event }} dk</span
            >
          </h1>
          <div
            class="grid grid-cols-2 gap-10 mt-12 justify-center items-center"
          >
            <div
              v-for="packg in convertDataToArray(collection.packages)"
              :key="packg.id"
              class="flex flex-col space-y-8"
            >
              <p class="text-center text-lg uppercase font-bold">
                {{ packg.en_name }}({{ packg.price_per_event }} DK X
                {{ packg.quantity }})
              </p>
              <div>
                <img
                  :src="packg.media[0].full_url"
                  :alt="packg.en_name"
                  class="htw-collection-package__img w-full object-cover"
                />
              </div>
            </div>
          </div>
          <div class="w-full flex items-center justify-center my-8 space-x-4">
            <Link
              :href="route('web.booking', collection.id)"
              class="
                btn btn-wide
                space-x-2
                bg-info
                border-2 border-info
                hover:bg-transparent hover:border-info hover:text-info
              "
            >
              <span>booking for {{ collection.min_price_per_event }} DK</span>
            </Link>
            <p class="text-2xl uppercase font-bold">or</p>
            <Link
              href="//nHref"
              class="
                btn btn-wide
                space-x-2
                bg-info
                border-2 border-info
                hover:bg-transparent hover:border-info hover:text-info
              "
            >
              <span>more details</span>
            </Link>
          </div>
        </div>
      </HtSection>
    </div>
  </WebLayout>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'

const components = {
  Head,
  Link,
  WebLayout,
  HtSection,
}

export default {
  name: 'WebCollectionPage',

  components,

  props: {
    collections: {
      type: Array,
      default: () => [],
    },
  },

  setup() {},

  methods: {
    convertDataToArray(data) {
      if (Array.isArray(data)) return data
      return Object.values(data)
    },
  },
}
</script>

<style scoped>
.htw-collection-package__img {
  width: 100%;
  height: 60vh;
}
</style>
