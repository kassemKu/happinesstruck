<template>
  <WebLayout>
    <Head title="OUR-PACKAGES">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__packages">
      <div class="htw-slaider-wrap absolute overflow-hidden w-full h-full">
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

  data() {
    return {
      packages: [
        {
          id: 1,
          name: 'here we find first package name',
          price: 65,
          image: '/images/packages/stem-t4l-l862hX_FET8-unsplash.jpg',
          shortDescription:
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias deserunt quas dignissimos consequatur unde? Nemo quia at neque recusandae omnis. Temporibus atque omnis numquam.',
          items: [
            {
              src: '/images/packages/markus-spiske-nvKQ1kxheRc-unsplash.jpg',
              blockClasses:
                'flex flex-col items-center space-y-8 bg-error bg-opacity-60 text-neutral-content',
              name: 'item name',
              shortDescription:
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ea tempore ipsa.',
            },
            {
              src: '/images/packages/stem-t4l-l862hX_FET8-unsplash.jpg',
              blockClasses:
                'bg-warning bg-opacity-50 flex flex-col items-center space-y-8 text-neutral-content',
              name: 'item name',
              shortDescription:
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ea tempore ipsa.',
            },
            {
              src: '/images/packages/markus-spiske-dWaRJ3WBnGs-unsplash.jpg',
              blockClasses:
                'bg-blue-600 bg-opacity-50 flex flex-col items-center space-y-8 text-neutral-content',
              name: 'item name',
              shortDescription:
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ea tempore ipsa.',
            },
            {
              src: '/images/packages/markus-spiske-OO89_95aUC0-unsplash.jpg',
              blockClasses:
                'bg-success bg-opacity-50 flex-col items-center space-y-8 text-neutral-content',
              name: 'item name',
              shortDescription:
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ea tempore ipsa.',
            },
          ],
        },
        {
          id: 2,
          name: 'second product',
          price: 65,
          image: '/images/packages/gustavo-alves-YOXSC4zRcxw-unsplash.jpg',
          imsgesSectionBgColor: 'bg-accent bg-opacity-40',
          textSectionBgColor: 'bg-base-100',
          items: [
            {
              src: '/images/659b72077a54ad832458b88d7873792c.jpg',
              blockClasses: 'bg-warning flex items-center',
            },
            {
              src: '/images/AZhu69ap-image-1-6.jpg',
              blockClasses: 'bg-primary flex items-center',
            },
            {
              src: '/images/products/product_23.jpg',
              blockClasses: 'bg-primary flex items-center',
            },
            {
              src: '/images/AZhu69ap-image-1-6.jpg',
              blockClasses: 'bg-success flex items-center',
            },
            {
              src: '/images/products/product_23.jpg',
              blockClasses: 'bg-blue-500 flex items-center',
            },
          ],
        },
        {
          id: 3,
          name: 'third product',
          price: 65,
          image: '/images/packages/stem-t4l-l862hX_FET8-unsplash.jpg',
          imsgesSectionBgColor: 'bg-warning bg-opacity-40',
          textSectionBgColor: 'bg-base-200',
        },
        {
          id: 4,
          name: 'fore product',
          price: 65,
          image: '/images/packages/stem-t4l-l862hX_FET8-unsplash.jpg',
          imsgesSectionBgColor: 'bg-success bg-opacity-40',
          textSectionBgColor: 'bg-neutral bg-opacity-40',
          items: [
            {
              src: '/images/659b72077a54ad832458b88d7873792c.jpg',
              blockClasses: 'bg-warning flex items-center',
            },
            {
              src: '/images/AZhu69ap-image-1-6.jpg',
              blockClasses: 'bg-primary flex items-center',
            },
            {
              src: '/images/products/product_23.jpg',
              blockClasses: 'bg-primary flex items-center',
            },
            {
              src: '/images/AZhu69ap-image-1-6.jpg',
              blockClasses: 'bg-success flex items-center',
            },
            {
              src: '/images/products/product_23.jpg',
              blockClasses: 'bg-blue-500 flex items-center',
            },
          ],
        },
        {
          id: 5,
          name: 'five product',
          price: 65,
          image: '/images/packages/stem-t4l-l862hX_FET8-unsplash.jpg',
          imsgesSectionBgColor: 'bg-secondary-focus bg-opacity-40',
          textSectionBgColor: 'bg-base-300 bg-opacity-40',
          items: [
            {
              src: '/images/659b72077a54ad832458b88d7873792c.jpg',
              blockClasses: 'bg-warning flex items-center',
            },
            {
              src: '/images/AZhu69ap-image-1-6.jpg',
              blockClasses: 'bg-primary flex items-center',
            },
            {
              src: '/images/products/product_23.jpg',
              blockClasses: 'bg-primary flex items-center',
            },
            {
              src: '/images/AZhu69ap-image-1-6.jpg',
              blockClasses: 'bg-success flex items-center',
            },
            {
              src: '/images/products/product_23.jpg',
              blockClasses: 'bg-blue-500 flex items-center',
            },
          ],
        },
        {
          id: 6,
          name: 'six product',
          price: 65,
          image: '/images/packages/stem-t4l-l862hX_FET8-unsplash.jpg',
          imsgesSectionBgColor: 'bg-secondary bg-opacity-40',
          textSectionBgColor: 'bg-base-300 bg-opacity-40',
          items: [
            {
              src: '/images/659b72077a54ad832458b88d7873792c.jpg',
              blockClasses: 'bg-warning flex items-center',
            },
            {
              src: '/images/AZhu69ap-image-1-6.jpg',
              blockClasses: 'bg-primary flex items-center',
            },
            {
              src: '/images/products/product_23.jpg',
              blockClasses: 'bg-primary flex items-center',
            },
            {
              src: '/images/AZhu69ap-image-1-6.jpg',
              blockClasses: 'bg-success flex items-center',
            },
            {
              src: '/images/products/product_23.jpg',
              blockClasses: 'bg-blue-500 flex items-center',
            },
          ],
        },
      ],
    }
  },
}
</script>

<style scoped>
.htw-packages__fixed-slide-nav {
  left: calc(50% - 3.5rem);
}
.progress {
  height: 4px;
}
</style>
