<template>
  <WebLayout>
    <Head title="OUR-PACKAGES">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__packages">
      <div class="htw-landing__packages-container">
        <div
          v-for="pg in packages"
          :key="pg.id"
          class="
            htw-package
            h-screen
            w-full
            grid grid-cols-2
            gap-x-8
            items-center
            px-16
            capitalize
          "
        >
          <div
            :style="{ backgroundImage: `url(${pg.media[0].full_url})` }"
            class="htw-package__img-bg bg-cover bg-center h-full"
          ></div>
          <div class="flex flex-col space-y-8 font-medium">
            <div class="alert alert-warning">
              <div class="flex-1">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  class="w-6 h-6 mx-2 stroke-current"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                  ></path>
                </svg>
                <label
                  >please note, this package avilable above
                  <em class="font-semibold text-red-600">{{ pg.min_price_per_event }} DK</em>
                  !</label
                >
              </div>
            </div>
            <!-- package min price note -->
            <div class="flex flex-col space-y-6 max-w-md">
              <h1 class="text-3xl font-bold">{{ pg.en_name }}</h1>
              <p class="text-neutral text-opacity-60">
                {{ pg.en_short_description }}
              </p>
              <p class="text-neutral text-opacity-40">
                {{ pg.en_description }}
              </p>
            </div>
            <div class="flex flex-col space-y-6">
              <div
                v-for="item in pg.items"
                :key="item.id"
                class="
                  bg-info bg-opacity-10
                  flex
                  justify-between
                  rounded-box
                  px-4 py-2
                "
              >
                <div class="flex space-x-2">
                  <img
                    :src="item.media[0].full_url"
                    :alt="item.en_name"
                    class="w-16 h-16 object-cover rounded-box border"
                  />
                  <div class="flex flex-col">
                    <p class="text-sm capitalize">{{ item.en_name }}</p>
                    <p class="text-sm capitalize text-gray-400 text-xs">
                      #{{ item.SKU }}
                    </p>
                  </div>
                </div>
                <div class="self-center">
                  <p class="text-sm capitalize font-bold">
                    {{item.price_per_event}} DK X {{ item.quantity }}
                  </p>
                </div>
              </div>
            </div>
            <!-- package items -->
            <div class="">
              <button
                :href="route('web.store')"
                class="
                  btn btn-wide btn-info
                  rounded-none rounded-tl-xl rounded-br-2xl
                "
                @click="openBookingBopup"
              >
                booking this package now
              </button>
            </div>
            <!-- booking btn -->
          </div>
        </div>
      </div>
    </div>
  </WebLayout>
  <Modal
    max-width="screen-lg"
    :title="`add items to this package`"
    type="info"
    action-title="save selected items and close"
    screen-height
  >
    modal
  </Modal>
</template>

<script>

import { useStore } from "vuex";
import { Head } from "@inertiajs/inertia-vue3";
import WebLayout from "@/Layouts/Web/WebLayout";
import Modal from "@/Shared/Layouts/Modal";

const components = {
  Head,
  WebLayout,
  Modal,
};

export default {
  name: "WebPackagesPage",

  components,

  props: {
    packages: {
      type: Array,
      default: () => [],
    },
  },

  setup() {
    const store = useStore();

    const openBookingBopup = () => {
      store.commit("openModal");
    };

    return {
      openBookingBopup,
    };
  },
};
</script>

<style scoped>
.htw-package__img-bg {
  height: calc(100vh - 20rem);
  border-top-left-radius: 7rem;
  border-bottom-right-radius: 8rem;
}
</style>
