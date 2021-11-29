<template>
  <WebLayout padding-x="16">
    <Head title="OUR-PACKAGES">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__packages">packages page</div>
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

  props: {},

  setup() {},
}
</script>

<style scoped>
.htw-package__img-bg {
  height: calc(100vh - 20rem);
  border-top-left-radius: 7rem;
  border-bottom-right-radius: 8rem;
}
</style>
