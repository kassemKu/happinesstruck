<template>
  <div class="relative min-h-screen w-full grid grid-cols-2">
    <div class="absolute top top-48 htw-site-title">
      <div class="w-full flex flex-col items-center justify-center">
        <h3 class="text-5xl uppercase font-bold">happiness truck</h3>
        <p class="text-lg font-semibold text-neutral text-opacity-60 uppercase">
          we make the happiness
        </p>
      </div>
    </div>
    <div class="bg-warning bg-opacity-40">
      <HtSection padding-x="16">
        <div class="flex flex-col space-y-6 mt-96">
          <div>
            <h3 class="text-4xl uppercase font-bold max-w-sm">
              collections of our packages for your kids events
            </h3>
          </div>
          <div>
            <p class="text-neutral text-opacity-60">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam
              quas deleniti odio obcaecati unde eligendi, ducimus rerum dolores
              dolorum eum libero possimus facere repellat nostrum, similique ut
              iste! Doloremque, delectus.
            </p>
          </div>
          <div>
            <Link
              :href="route('web.collections')"
              class="
                btn btn-block btn-info
                max-w-xs
                rounded-none rounded-tl-xl rounded-br-2xl
              "
              >visit our awesome collections</Link
            >
          </div>
        </div>
      </HtSection>
    </div>
    <!-- our packages collections -->
    <div class="bg-info bg-opacity-40">
      <HtSection padding-x="16">
        <div class="flex flex-col space-y-6 mt-96">
          <div>
            <h3 class="text-4xl uppercase font-bold max-w-sm">
              Lots of lots of toy sets your child deserves
            </h3>
          </div>
          <div>
            <p class="text-neutral text-opacity-60">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam
              quas deleniti odio obcaecati unde eligendi, ducimus rerum dolores
              dolorum eum libero possimus facere repellat nostrum, similique ut
              iste! Doloremque, delectus.
            </p>
          </div>
          <div>
            <Link
              :href="route('web.store')"
              class="
                btn btn-block btn-warning
                max-w-xs
                rounded-none rounded-tl-xl rounded-br-2xl
              "
              >visit our store</Link
            >
          </div>
        </div>
      </HtSection>
    </div>
    <!-- our store -->
  </div>
</template>

<script>
import HtSection from "@/Shared/Layouts/HtSection";
import { Link } from "@inertiajs/inertia-vue3";

const components = {
  HtSection,
  Link,
};

export default {
  name: "LandingMainSections",

  components,
};
</script>

<style scoped>
.htw-site-title {
  left: 34%;
}
.htw-landing__packages-slide {
  height: calc(100vh - 20rem);
  border-top-left-radius: 7rem;
  border-bottom-right-radius: 8rem;
}
</style>
