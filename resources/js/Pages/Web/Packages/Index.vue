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
            <div v-if="index === 0" class="grid grid-cols-2 h-full">
              <div class="h-full w-full bg-error bg-opacity-40 pt-36 pl-16">
                <div class="alert alert-warning max-w-sm shadow-inner">
                  <div class="space-x-2 text-yellow-800 text-opacity-50">
                    <div>
                      <VueFeather type="alert-circle" />
                    </div>
                    <label>
                      <span
                        class="font-semibold text-sm capitalize leading-relaxed"
                        >please note: this package available above 200 DK, you
                        can choose more items
                      </span>
                      <button class="btn btn-sm btn-ghost space-x-2">
                        <span>from here</span>
                        <VueFeather type="arrow-right-circle" />
                      </button>
                    </label>
                  </div>
                </div>
                <div class="flex flex-col space-y-8 mt-16 capitalize">
                  <h1 class="text-4xl font-bold max-w-sm leading-10">
                    {{ slide.name }}
                  </h1>
                  <p
                    class="
                      text-black text-opacity-40
                      max-w-lg
                      leading-wide
                      text-lg
                      font-medium
                    "
                  >
                    {{ slide.shortDescription }}
                  </p>
                  <div class="flex space-x-4 max-w-lg">
                    <button class="btn">booking now</button>
                  </div>
                </div>
              </div>
              <div class="h-full w-full grid grid-cols-2">
                <div
                  v-for="item in slide.items"
                  :key="item"
                  :class="item.blockClasses"
                  class="p-8"
                >
                  <img
                    :src="item.src"
                    alt="item name"
                    class="object-scale-down w-72 h-72"
                  />
                  <div class="flex flex-col space-y-4 capitalize font-medium">
                    <h3 class="text-3xl">{{ item.name }}</h3>
                    <p class="text-sm">{{ item.shortDescription }}</p>
                    <button
                      class="
                        btn
                        bg-base-100
                        border-base-100
                        text-base-content
                        w-36
                        hover:border-base-100
                        hover:bg-transparent
                        hover:text-base-100
                      "
                    >
                      read more
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div v-else-if="index === 1" class="h-full bg-warning">
              {{ slide.name }}
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
      <!-- <div class="fixed h-screen w-36 flex content-end">jkdskjd</div> -->
    </div>
  </WebLayout>
</template>

<script>
import { onBeforeUpdate, onMounted } from 'vue'
import { gsap, Power2 } from 'gsap'
import { Head } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'

const components = {
  Head,
  WebLayout,
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

    const setContainer = (el) => {
      container = el
    }

    const slideSection = (el) => {
      slides.push(el)
    }

    const wheelMouseAnim = (e) => {
      let newScroll = true
      activeSlide = e.deltaY > 0 ? (activeSlide += 1) : (activeSlide -= 1)

      // make sure we're not past the end or beginning slide
      activeSlide = activeSlide < 0 ? 0 : activeSlide
      activeSlide =
        activeSlide > slides.length - 1 ? slides.length - 1 : activeSlide

      // Make sure there's at least 50ms between the last scroll event and this one
      if (timeout) {
        clearTimeout(timeout)
      }
      timeout = setTimeout(() => {
        newScroll = true
      }, 50)

      if (!newScroll || mouseAnim.isActive() || gsap.isTweening(container))
        return

      if (!mouseAnim.isActive()) {
        newScroll = false
        mouseAnim.to(container, {
          y: offsets[activeSlide],
          duration: dur,
          ease: Power2.easeInOut,
        })
      }
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

    return { wheelMouseAnim, slideSection, setContainer }
  },

  data() {
    return {
      packages: [
        {
          id: 1,
          name: 'here we find first package name',
          price: 65,
          shortDescription:
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias deserunt quas dignissimos consequatur unde? Nemo quia at neque recusandae omnis. Temporibus atque omnis numquam.',
          items: [
            {
              src: '/images/products/fun-3d-illustration-astronaut-with-vr-helmet-removebg-preview.png',
              blockClasses:
                'flex flex-col items-center space-y-8 bg-error text-neutral-content',
              name: 'item name',
              shortDescription:
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ea tempore ipsa.',
            },
            {
              src: '/images/products/4387-removebg-preview.png',
              blockClasses:
                'bg-warning flex flex-col items-center space-y-8 text-neutral-content',
              name: 'item name',
              shortDescription:
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ea tempore ipsa.',
            },
            {
              src: '/images/imageedit_7_9494288863-removebg-preview.png',
              blockClasses:
                'bg-blue-600 flex flex-col items-center space-y-8 text-neutral-content',
              name: 'item name',
              shortDescription:
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ea tempore ipsa.',
            },
            {
              src: '/images/538c6862971401.Y3JvcCwxMjI4LDk2MCwyOTEsMTcw-removebg-preview.png',
              blockClasses:
                'bg-success flex-col items-center space-y-8 text-neutral-content',
              name: 'item name',
              shortDescription:
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ea tempore ipsa.',
            },
          ],
        },
        {
          id: 2,
          name: 'second product',
          src: '/images/products/4387-removebg-preview.png',
          price: 65,
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
          src: '/images/products/fun-3d-illustration-astronaut-with-vr-helmet-removebg-preview.png',
          price: 65,
          imsgesSectionBgColor: 'bg-warning bg-opacity-40',
          textSectionBgColor: 'bg-base-200',
        },
        {
          id: 4,
          name: 'five product',
          src: '/images/538c6862971401.Y3JvcCwxMjI4LDk2MCwyOTEsMTcw-removebg-preview.png',
          price: 65,
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
          name: 'six product',
          src: '/images/imageedit_7_9494288863-removebg-preview.png',
          price: 65,
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
          name: 'seven product',
          src: '/images/products/4387.jpg',
          price: 65,
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
