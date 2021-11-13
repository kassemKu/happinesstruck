<template>
  <HtSection padding-x="0" padding-y="0">
    <div
      class="
        landing-page-section
        section__ourclients-says
        text-neutral
        px-24
        py-12
      "
    >
      <div class="max-w-md">
        <h3 class="text-2xl uppercase font-bold leading-10">
          what our client says
        </h3>
        <p class="text-neutral text-opacity-60 leading-relaxed font-medium">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit enim
          quos.
        </p>
      </div>
      <div class="grid grid-cols-4 gap-x-8 mt-12">
        <div
          v-for="(client, index) in ourClients"
          :key="index"
          class="flex flex-col space-y-4 htw-our-clients"
        >
          <img
            :src="client.src"
            alt="username"
            class="object-cover h-36 w-36 rounded-l-2xl htw-our-clients__img"
          />
          <p class="font-semibold capitalize text-base">{{ client.name }}</p>
          <p class="text-neutral text-opacity-50 font-medium text-sm">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit....
          </p>
        </div>
      </div>
    </div>
    <!-- our client -->
  </HtSection>
</template>

<script>
import HtSection from '@/Shared/Layouts/HtSection'

const components = { HtSection }

export default {
  name: 'LandingOurClient',

  components,

  data() {
    return {
      ourClients: [
        {
          name: 'clien name here',
          src: '/images/me.png',
        },
        {
          name: 'clien name here',
          src: '/images/me.png',
        },
        {
          name: 'clien name here',
          src: '/images/me.png',
        },
        {
          name: 'clien name here',
          src: '/images/me.png',
        },
      ],
    }
  },
}
</script>

<style scoped>
.htw-our-clients > .htw-our-clients__img {
  border-top-left-radius: 3.5rem;
  border-bottom-right-radius: 4rem;
}
</style>
