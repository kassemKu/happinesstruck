<template>
  <div class="relative min-h-screen w-full grid grid-cols-1 sm:grid-cols-2">
    <!-- <div class="absolute top-16 ltr:left-1/4 rtl:left-1/3 htw-site-title">
      <div class="w-full flex flex-col items-center justify-center">
        <h3 class="text-3xl sm:text-5xl uppercase font-bold">
          {{ $t('site_title') }}
        </h3>
        <p class="text-lg font-semibold text-neutral text-opacity-60 uppercase">
          {{ $t('site_subtitle') }}
        </p>
      </div>
    </div> -->
    <!-- <div class="bg-warning bg-opacity-40">
      <HtSection padding-x="16">
        <div
          class="
            flex flex-col
            space-y-6
            sm:space-y-12
            mt-32
            sm:mt-48
            mb-8
            sm:mb-0
            md:px-12
          "
        >
          <div>
            <h3
              class="
                text-2xl
                sm:text-4xl
                uppercase
                font-bold
                max-w-auto
                sm:max-w-sm
              "
            >
              {{ $t('our_collection') }}
            </h3>
          </div>
          <div>
            <p class="text-neutral text-opacity-60">
              {{ $t('lorem') }}
            </p>
          </div>
          <div>
            <Link
              :href="route('web.collections')"
              class="
                btn btn-block btn-info
                max-w-xs
                rounded-none rounded-tl-xl rounded-br-2xl
                ltr:text-base
                rtl:text-lg
              "
              >{{ $t('visit_page', { page: $t('collections') }) }}</Link
            >
          </div>
        </div>
      </HtSection>
    </div> -->
    <!-- our packages collections -->

    <!-- <div class="bg-info bg-opacity-40">
      <HtSection padding-x="16">
        <div
          class="
            flex flex-col
            space-y-6
            sm:space-y-12
            mt-8
            sm:mt-48
            mb-8
            sm:mb-0
            px-0
            md:px-12
          "
        >
          <div>
            <h3
              class="
                text-2xl
                sm:text-4xl
                uppercase
                font-bold
                max-w-auto
                sm:max-w-sm
              "
            >
              {{ $t('lots_toys') }}
            </h3>
          </div>
          <div>
            <p class="text-neutral text-opacity-60">
              {{ $t('lorem') }}
            </p>
          </div>
          <div>
            <Link
              :href="route('web.store')"
              class="
                btn btn-block btn-warning
                max-w-xs
                rounded-none rounded-tl-xl rounded-br-2xl
                ltr:text-base
                rtl:text-lg
              "
              >{{ $t('visit_our_store_page') }}</Link
            >
          </div>
        </div>
      </HtSection>
    </div> -->
    <!-- our store -->
    <h1 class="font-body-arabic m-36 text-7xl font-black text-warning">
      عربة السعادة
    </h1>
    <div class="htm-products-slider"></div>
  </div>
</template>

<script>
import HtSection from '@/Shared/Layouts/HtSection'
import { Link } from '@inertiajs/inertia-vue3'

const components = {
  HtSection,
  Link,
}

export default {
  name: 'LandingMainSections',

  components,
}
</script>

<style scoped>
.htw-landing__packages-slide {
  height: calc(100vh - 20rem);
  border-top-left-radius: 7rem;
  border-bottom-right-radius: 8rem;
}
</style>
