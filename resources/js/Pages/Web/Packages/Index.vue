<template>
  <WebLayout>
    <Head title="OUR-PACKAGES">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__packages">
      <!--<div class="htw-slaider-wrap absolute overflow-hidden w-full h-full">
        <div
          :ref="setContainer"
          class="htw-slide-container w-full h-full"
          @wheel="wheelMouseAnim($event)"
        >
          <section
            v-for="(slide, index) in packages"
            :key="slide.id"
            :ref="slideSection"
            class="mtw-slide h-screen w-screen"
          >
            <div v-if="index === 0" class="h-full w-full">
              <PackagesPageFirstSlide
                :items="slide.items"
                :name="slide.name"
                :short-description="slide.shortDescription"
              />
            </div>
            <div v-else-if="index === 1" class="h-full w-full">
              <PackagesPageSecondSlide
                :items="slide.items"
                :name="slide.name"
                :short-description="slide.shortDescription"
                :src="slide.image"
              />
            </div>
            <div v-else-if="index === 2" class="h-full bg-error">
              {{ slide.name }}
            </div>
            <div v-else-if="index === 3" class="h-full bg-info">
              {{ slide.name }}
            </div>
            <div v-else-if="index === 4" class="h-full bg-accent">
              {{ slide.name }}
            </div>
            <div v-else-if="index === 5" class="h-full bg-neutral">
              {{ slide.name }}
            </div>
          </section>
        </div>
      </div>
      <div
        ref="fixedNav"
        class="
          htw-packages__fixed-slide-nav
          fixed
          h-screen
          w-14
          flex flex-col
          justify-between
          items-center
          pt-20
          pb-4
          space-y-12
          text-base-content text-opacity-50
        "
      >
        <div class="flex flex-col">
          <button
            class="btn btn-ghost transform hover:scale-105 hover:bg-transparent"
          >
            <VueFeather type="instagram" stroke-width="2" class="h-5 w-5" />
          </button>
          <button
            class="btn btn-ghost transform hover:scale-105 hover:bg-transparent"
          >
            <VueFeather type="facebook" stroke-width="2" class="h-5 w-5" />
          </button>
          <button
            class="btn btn-ghost transform hover:scale-105 hover:bg-transparent"
          >
            <VueFeather type="twitter" stroke-width="2" class="h-5 w-5" />
          </button>
          <button
            class="btn btn-ghost transform hover:scale-105 hover:bg-transparent"
          >
            <VueFeather type="youtube" stroke-width="2" class="h-5 w-5" />
          </button>
        </div>

        <div class="flex flex-col items-center space-y-8">
          <div class="flex flex-col items-center space-y-24">
            <div>
              <progress
                class="progress w-36 transform rotate-90"
                :value="activeSlide + 1 * 10"
                :max="packages.length + 1 * 10"
              ></progress>
            </div>
            <div class="flex flex-col items-center space-y-2">
              <button type="button" @click="slideUp">
                <ArrowUp32 class="h-6 w-6" />
              </button>
              <button
                type="button"
                class="group hover:text-info"
                @click="slideDown"
              >
                <ArrowDown32 class="h-6 w-6" />
              </button>
            </div>
          </div>
          <div class="flex flex-col items-center space-y-2">
            <p
              class="uppercase text-xs font-semibold"
              style="writing-mode: tb-rl"
            >
              scroll down
            </p>
            <ArrowDown32 class="animate-bounce h-6 w-6" />
          </div>
        </div>
      </div> -->
      <div class="htw-landing__packages-container">
        <div v-for="(pg, index) in packages" :key="index" class="htw-package h-screen w-screen grid grid-cols-2 gap-x-8 items-center px-16 capitalize">
          <div :style="{backgroundImage: `url(${pg.media[0].full_url})`}" class="htw-package__img-bg bg-cover bg-center h-full"></div>
          <div class="flex flex-col space-y-8">
            <h1 class="text-3xl font-bold max-w-md">{{ pg.en_name }}</h1>
            <p class="text-neutral text-opacity-60 font-medium">{{ pg.en_short_description }}</p>
          </div>
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script>
import { onBeforeUpdate, onMounted, ref } from 'vue'
import { gsap, Power2 } from 'gsap'
import { Head } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import PackagesPageFirstSlide from '@/Components/PackagesPage/Slide1'
import PackagesPageSecondSlide from '@/Components/PackagesPage/Slide2'

const components = {
  Head,
  WebLayout,
  PackagesPageFirstSlide,
  PackagesPageSecondSlide,
}

export default {
  name: 'WebPackagesPage',

  components,

  props: {
    packages: {
      type: Array,
      default: () => ([])
    }
  },

  setup() {
    // dom elements
    let container
    let slides = []
    // section slide offset Y
    let offsets = []
    let activeSlide = 0
    const oldSlide = 0
    let dur = 0.6
    const mouseAnim = gsap.timeline()
    let timeout

    const fixedNav = ref(null)

    const setContainer = (el) => {
      container = el
    }

    const slideSection = (el) => {
      slides.push(el)
    }

    // make sure we're not past the end or beginning slide
    const wrapSlide = () => {
      activeSlide = activeSlide < 0 ? 0 : activeSlide
      activeSlide =
        activeSlide > slides.length - 1 ? slides.length - 1 : activeSlide
    }

    const wheelMouseAnim = (e) => {
      let newScroll = true
      activeSlide = e.deltaY > 0 ? (activeSlide += 1) : (activeSlide -= 1)

      // Make sure there's at least 50ms between the last scroll event and this one
      if (timeout) {
        clearTimeout(timeout)
      }
      timeout = setTimeout(() => {
        newScroll = true
      }, 50)

      if (!newScroll || mouseAnim.isActive() || gsap.isTweening(container))
        return

      wrapSlide()

      if (!mouseAnim.isActive()) {
        newScroll = false
        mouseAnim.to(container, {
          y: offsets[activeSlide],
          duration: dur,
          ease: Power2.easeInOut,
        })
      }
    }

    const slideUp = () => {
      wrapSlide()
      if (gsap.isTweening(container)) return

      activeSlide -= 1

      mouseAnim.to(container, {
        y: offsets[activeSlide],
        duration: dur,
        ease: Power2.easeInOut,
      })
    }

    const slideDown = () => {
      if (gsap.isTweening(container)) return
      wrapSlide()
      activeSlide += 1
      console.log(activeSlide)
      mouseAnim.to(container, {
        y: offsets[activeSlide],
        duration: dur,
        ease: Power2.easeInOut,
      })
    }

    onBeforeUpdate(() => {
      slides = []
    })

    onMounted(() => {
      slides = gsap.utils.toArray(slides)

      activeSlide = oldSlide

      for (let i = 0; i < slides.length; i++) {
        offsets.push(-slides[i].offsetTop)
      }
    })

    return {
      wheelMouseAnim,
      slideSection,
      setContainer,
      slideDown,
      slideUp,
      activeSlide,
      fixedNav,
    }
  },
}
</script>

<style scoped>
.htw-package__img-bg  {
  height: calc(100vh - 20rem);
  border-top-left-radius: 7rem;
  border-bottom-right-radius: 8rem;
}
</style>
