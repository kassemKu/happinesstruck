<template>
  <WebLayout>
    <Head title="OUR-PACKAGES">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__single-package">
      <h1>{{ pack.en_name }}</h1>
    </div>
  </WebLayout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'

const components = {
  Head,
  WebLayout,
}

export default {
  name: 'WebPackagesPage',

  components,

  props: {
    pack: {
      type: Object,
      default: () => ({}),
    },
  },
}
</script>
