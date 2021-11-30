<template>
  <WebLayout>
    <Head title="BOOKING">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__booking-checkout mt-36">
      <HtSection> checkout booking </HtSection>
    </div>
  </WebLayout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'

const components = {
  Head,
  WebLayout,
  HtSection,
}

export default {
  name: 'WebBookingPage',

  components,

  setup() {},
}
</script>
