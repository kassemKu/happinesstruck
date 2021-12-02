<template>
  <HtSection padding-x="0" padding-y="0">
    <div class="flex space-x-24 px-24 py-16 h-[35rem] bg-indigo-100">
      <div class="htw-landing__single-service__img-container w-96">
        <img
          class="h-full w-full object-cover overflow-hidden"
          src="/images/packages/markus-spiske-OO89_95aUC0-unsplash.jpg"
        />
      </div>
      <div class="flex-grow h-full flex flex-col justify-between">
        <div class="max-w-lg text-neutral">
          <h3 class="text-2xl uppercase font-bold leading-10">service title</h3>
          <p class="text-neutral text-opacity-60 leading-relaxed">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit enim
            quos, non dolor assumenda mollitia suscipit facilis cum
            reprehenderit ad sint! A quae vitae ad recusandae reiciendis saepe
            at beatae.
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
                >more then</span
              >
              <span class="text-blue-700 font-bold uppercase text-2xl">
                12</span
              >
            </p>
            <p>ready packages</p>
          </div>
          <div class="flex flex-col justify-center">
            <p>
              <span
                class="
                  text-center
                  font-semibold
                  text-neutral text-opacity-40 text-xs
                "
                >more then</span
              >
              <span class="text-blue-700 font-bold uppercase text-2xl">
                12</span
              >
            </p>
            <p>ready trucks</p>
          </div>
          <div class="flex flex-col justify-center">
            <p>
              <span
                class="
                  text-center
                  font-semibold
                  text-neutral text-opacity-40 text-xs
                "
                >more then</span
              >
              <span class="text-blue-700 font-bold uppercase text-2xl">
                12</span
              >
            </p>
            <p>ready packages</p>
          </div>
          <div class="flex flex-col justify-center">
            <p>
              <span class="font-semibold text-neutral text-opacity-40 text-xs"
                >more then</span
              >
              <span class="text-blue-700 font-bold uppercase text-2xl">
                12</span
              >
            </p>
            <p>ready trucks</p>
          </div>
        </div>
        <div class="w-full">
          <Link
            :href="route('web.store')"
            class="
              btn btn-wide btn-info
              rounded-none rounded-tl-xl rounded-br-2xl
            "
            >visit our services page</Link
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
  name: 'LandingSrevice',

  components,
}
</script>

<style scoped>
.htw-landing__single-service__img-container > img {
  border-top-left-radius: 3.5rem;
  border-bottom-right-radius: 4rem;
}
</style>
