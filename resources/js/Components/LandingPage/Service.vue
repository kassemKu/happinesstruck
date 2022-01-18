<template>
  <HtSection padding-x="0" padding-y="0">
    <div
      class="
        flex flex-col
        space-y-8
        sm:space-y-0 sm:flex-row sm:space-x-8
        h-auto
        bg-indigo-100
        p-8
        md:px-24
        sm:py-12
        -mx-8
        sm:-mx-0
      "
    >
      <div
        class="
          htw-landing__single-service__img-container
          h-64
          sm:h-96
          w-full
          sm:w-96
        "
      >
        <img
          class="h-full w-full object-cover overflow-hidden"
          src="/images/packages/markus-spiske-OO89_95aUC0-unsplash.jpg"
        />
      </div>
      <div class="flex-grow h-full flex flex-col space-y-8">
        <div class="max-w-lg text-neutral">
          <h3 class="text-2xl uppercase font-bold leading-10">
            {{ $t('service_title') }}
          </h3>
          <p class="text-neutral text-opacity-60 leading-relaxed">
            {{ $t('lorem') }}
          </p>
        </div>
        <div class="grid grid-cols-2 gap-y-12 capitalize font-semibold">
          <div class="flex flex-col justify-center">
            <p>
              <span
                class="
                  text-center
                  font-semibold
                  text-neutral text-opacity-40 text-xs
                "
                >{{ $t('more_than') }}</span
              >
              <span class="text-blue-700 font-bold uppercase text-2xl">
                12</span
              >
            </p>
            <p>{{ $t('ready_packages') }}</p>
          </div>
          <div class="flex flex-col justify-center">
            <p>
              <span
                class="
                  text-center
                  font-semibold
                  text-neutral text-opacity-40 text-xs
                "
                >{{ $t('more_than') }}</span
              >
              <span class="text-blue-700 font-bold uppercase text-2xl">
                12</span
              >
            </p>
            <p>{{ $t('ready_trucks') }}</p>
          </div>
          <div class="flex flex-col justify-center">
            <p>
              <span
                class="
                  text-center
                  font-semibold
                  text-neutral text-opacity-40 text-xs
                "
                >{{ $t('more_than') }}</span
              >
              <span class="text-blue-700 font-bold uppercase text-2xl">
                12</span
              >
            </p>
            <p>{{ $t('ready_packages') }}</p>
          </div>
          <div class="flex flex-col justify-center">
            <p>
              <span
                class="font-semibold text-neutral text-opacity-40 text-xs"
                >{{ $t('more_than') }}</span
              >
              <span class="text-blue-700 font-bold uppercase text-2xl">
                12</span
              >
            </p>
            <p>{{ $t('ready_trucks') }}</p>
          </div>
        </div>
        <div class="w-full flex items-center">
          <Link
            :href="route('web.store')"
            class="
              btn btn-wide btn-info
              rounded-none rounded-tl-xl rounded-br-2xl
            "
            >{{ $t('visit_our_services_page') }}</Link
          >
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
  name: 'LandingService',

  components,
}
</script>

<style scoped>
.htw-landing__single-service__img-container > img {
  border-top-left-radius: 3.5rem;
  border-bottom-right-radius: 4rem;
}
</style>
