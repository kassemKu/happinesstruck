<template>
  <HtSection padding-x="0" padding-y="0">
    <div
      class="
        landing-page-section
        section__our-clients-says
        text-neutral
        p-8
        sm:px-24 sm:py-12
        -mx-8
        sm:-mx-0
      "
    >
      <div class="max-w-md">
        <h3 class="text-2xl uppercase font-bold leading-10">
          {{ $t('what_clients_say') }}
        </h3>
        <p class="text-neutral text-opacity-60 leading-relaxed font-medium">
          {{ $t('lorem_11') }}
        </p>
      </div>
      <div class="grid grid-cols-1 gap-y-4 md:grid-cols-4 gap-x-8 mt-12">
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
          <p class="font-semibold capitalize text-base">
            {{ $t('client_name_here') }}
          </p>
          <p class="text-neutral text-opacity-50 font-medium text-sm">
            {{ $t('lorem_dot') }}
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
          name: 'client name here',
          src: '/images/me.png',
        },
        {
          name: 'client name here',
          src: '/images/me.png',
        },
        {
          name: 'client name here',
          src: '/images/me.png',
        },
        {
          name: 'client name here',
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
