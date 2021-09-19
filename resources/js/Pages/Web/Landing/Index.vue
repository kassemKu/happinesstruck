<template>
  <WebLayout>
    <Head title="Welcome">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="flex h-screen w-screen">
      <div class="bg-primary h-96 w-96"></div>
      <div class="bg-error h-96 w-96"></div>
      <div class="bg-warning h-96 w-96"></div>
      <div class="bg-blue-500 h-96 w-96"></div>
      <div class="bg-yellow-500 h-96 w-96"></div>
      <div class="bg-yellow-900 h-96 w-96"></div>
      <div class="bg-info h-96 w-96"></div>
    </div>

    <div class="parent w-screen h-96 bg-grey-300 flex space-x-10">
      <div class="bg-red-400">icon here</div>
      <div class="flex flex-col">
        <h1 class="text-xl">title</h1>
        <p class="max-w-sm">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id eligendi
          assumenda delectus rem. Dolore rem, ipsa totam non incidunt assumenda
          modi, fuga est suscipit fugit ea, obcaecati recusandae amet soluta.
        </p>
      </div>
    </div>
    <button class="md:hidden text-white p-2 rounded-full bg-red-600">
      responsive
    </button>
  </WebLayout>
</template>

<script>
import { Head /* Link */ } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'

export default {
  components: {
    Head,
    // Link,
    WebLayout,
  },
}
</script>
