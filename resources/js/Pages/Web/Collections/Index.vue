<template>
  <WebLayout>
    <Head title="OUR-COLLECTION">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__collection mt-12">
      <div class="w-full flex items-center justify-center px-4 md:px-0">
        <h2
          class="
            text-2xl
            md:text-4xl
            capitalize
            font-bold
            text-slate-500
            max-w-screen-sm
            leading-relaxed
            text-center
          "
        >
          {{ $t('our_collection') }}
        </h2>
      </div>
      <HtSection>
        <div class="px-8 flex flex-col space-y-12">
          <div
            v-for="collection in collections"
            :key="collection.id"
            class="min-h-screen"
          >
            <h1 class="text-center text-2xl font-bold uppercase text-slate-600">
              {{
                $i18n.locale === 'en' ? collection.en_name : collection.ar_name
              }}
              <span class="text-warning font-bold text-2xl rtl:mr-2"
                >{{ collection.min_price_per_event }}
                {{ $i18n.locale === 'en' ? 'dk' : 'دك' }}</span
              >
            </h1>
            <div
              class="
                grid grid-cols-1
                md:grid-cols-2
                gap-10
                mt-8
                justify-center
                items-center
              "
            >
              <div
                v-for="packg in convertDataToArray(collection.packages)"
                :key="packg.id"
                class="flex flex-col space-y-8"
              >
                <p class="text-center text-lg uppercase font-bold">
                  {{ $i18n.locale === 'en' ? packg.en_name : packg.ar_name }}
                  <span class="text-info rtl:mr-2 ltr:ml-2">
                    ({{ packg.price_per_event }}
                    {{ $i18n.locale === 'en' ? 'dk' : 'دك' }} X
                    {{ packg.quantity }})
                  </span>
                </p>
                <div>
                  <img
                    :src="packg.media[0].full_url"
                    :alt="packg.en_name"
                    class="
                      htw-collection-package__img
                      w-full
                      object-cover
                      rounded-box
                    "
                  />
                </div>
              </div>
            </div>
            <div class="w-full flex items-center justify-center my-8 space-x-4">
              <Link
                :href="route('web.booking', collection.id)"
                class="
                  btn btn-md
                  md:btn-wide
                  bg-info
                  border-2 border-info
                  hover:bg-transparent hover:border-info hover:text-info
                "
              >
                <span
                  >{{ $t('booking_for') }} {{ collection.min_price_per_event }}
                  {{ $i18n.locale === 'en' ? 'dk' : 'دك' }}</span
                >
              </Link>
              <p class="text-xl md:text-2xl uppercase font-bold">
                {{ $t('or') }}
              </p>
              <Link
                href="//nHref"
                class="
                  btn btn-md
                  md:btn-wide
                  bg-info
                  border-2 border-info
                  hover:bg-transparent hover:border-info hover:text-info
                "
              >
                <span>{{ $t('more_details') }}</span>
              </Link>
            </div>
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
