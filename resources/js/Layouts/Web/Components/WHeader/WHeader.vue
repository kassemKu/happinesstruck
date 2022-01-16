<template>
  <div class="htw-header__section relative">
    <!-- <div
    class="
      htw-header
      flex
      items-center
      justify-between
      px-12
      lg:px-16
      h-36
      fixed
      w-full
      top-0
      z-10
    "
  >
    <div class="htw-header-menu">
      <button
        class="
          htw-menu-btn
          btn btn-outline btn-circle
          border-2
          transform
          hover:bg-transparent hover:scale-110 hover:text-info hover:border-info
        "
        @click.prevent="openWebSidebar"
      >
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          class="stroke-current"
        >
          <path
            d="M7 12L21 12"
            stroke-width="3"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M3 6H21"
            stroke-width="3"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M3 18H21"
            stroke-width="3"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </button>
    </div>
    <Link
      href="/"
      class="
        htw-header-logo
        inline-flex
        items-center
        justify-center
        space-x-2
        uppercase
        font-black
        text-xl text-warning
        transform
        hover:bg-transparent hover:text-info
      "
    >
      <img
        src="/images/imageedit_3_9616434340.png"
        alt="happiness truck"
        class="object-cover w-36 h-36"
      />
    </Link>
    <div class="flex space-x-8">
      <div v-show="!$page.props.user" class="flex">
        <Link
          :href="route('auth')"
          class="
            btn btn-ghost
            transform
            font-semibold
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          {{ $t('login') }}
        </Link>
        <Link
          :href="route('auth')"
          class="
            btn btn-ghost
            font-semibold
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          {{ $t('register') }}
        </Link>
      </div>
      <div class="htw-header-user_area flex items-center">
        <div class="indicator">
          <div class="indicator-item badge badge-info text-sm font-semibold">
            {{ getCartItemsCount }}
          </div>
          <Link
            :href="route('web.mycart')"
            class="
              btn btn-ghost
              font-semibold
              transform
              hover:bg-transparent hover:text-info hover:scale-110
            "
          >
            <VueFeather type="shopping-bag" />
          </Link>
        </div>
        <button
          class="
            btn btn-ghost
            font-semibold
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          <VueFeather type="heart" />
        </button>
        <button
          class="
            btn btn-ghost
            transform
            hover:bg-transparent hover:text-info hover:scale-110
          "
        >
          <VueFeather type="search" />
        </button>
        <LanguageSwitcher />
        <template v-if="$page.props.user">
          <UserAreaDropdown />
        </template>
      </div>
    </div>
  </div> -->
    <header
      class="
        htw-header
        flex
        items-center
        justify-between
        px-4
        lg:px-16
        h-24
        w-full
        relative
        z-20
      "
    >
      <div class="htw-header__logo-container">
        <button
          type="button"
          class="
            htw-header__logo
            flex flex-col
            lg:flex-row
            items-center
            justify-center
            space-x-2
            uppercase
            transform
            cursor-pointer
            transition
            ease-in
            hover:bg-transparent hover:text-info hover:scale-105
          "
        >
          <CircleFilled32 />
          <span class="font-black text-base lg:text-xl htw-header__logo-text">{{
            $t('site_title')
          }}</span>
        </button>
      </div>
      <div class="flex space-x-8">
        <div class="htw-header-user_area flex items-center">
          <div class="indicator">
            <div class="indicator-item badge badge-info text-sm font-semibold">
              {{ getCartItemsCount }}
            </div>
            <Link
              :href="route('web.mycart')"
              class="
                btn btn-ghost
                font-semibold
                transform
                hover:bg-transparent hover:text-info hover:scale-110
              "
            >
              <VueFeather type="shopping-bag" />
            </Link>
          </div>
          <button
            class="
              btn btn-ghost
              transform
              hover:bg-transparent hover:text-info hover:scale-110
            "
          >
            <VueFeather type="search" />
          </button>
          <LanguageSwitcher />
          <template v-if="$page.props.user">
            <UserAreaDropdown />
          </template>
        </div>
        <button
          class="
            htw-menu-btn
            btn btn-outline btn-circle
            border-2
            transform
            hover:bg-transparent
            hover:scale-110
            hover:text-info
            hover:border-info
          "
          :class="disabled && 'btn-disabled'"
          @click="toggleWebMenu"
        >
          <svg
            v-if="isMenuOpen"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M19.1421 19.1421L5 5"
              stroke="black"
              stroke-width="3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M19.1421 4.99999L5 19.1421"
              stroke="black"
              stroke-width="3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <svg
            v-else
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="stroke-current"
          >
            <path
              d="M7 12L21 12"
              stroke-width="3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M3 6H21"
              stroke-width="3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M3 18H21"
              stroke-width="3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
      </div>
    </header>
    <div
      ref="menuWrap"
      class="
        htw-menu-container
        fixed
        inset-0
        min-h-screen
        max-h-screen
        h-screen
        min-w-full
        max-w-full
        w-screen
        z-10
        hidden
        capitalize
      "
    >
      <div
        ref="menuBlackBg"
        class="
          htw-menu__black-bg
          bg-neutral
          fixed
          inset-0
          h-screen
          w-screen
          max-h-screen
        "
        style="z-index: -1"
      ></div>
      <div
        ref="menuContent"
        class="
          htw-menu__content
          bg-warning bg-cover bg-center bg-no-repeat
          relative
          inset-0
          h-screen
          w-screen
          overflow-y-auto
          ht-scrollbar
        "
      >
        <div
          class="
            htw-menu__nav-wrap
            relative
            flex flex-row
            justify-between
            lg:flex-col lg:space-y-12
            px-6
            lg:px-16
            top-28
            text-neutral-content
          "
        >
          <nav class="htw-menu__nav">
            <ul class="flex flex-col">
              <li
                class="
                  overflow-hidden
                  h-16 h-16
                  lg:h-28
                  w-max
                  relative
                  flex
                  items-center
                  cursor-pointer
                  hover:text-neutral
                "
              >
                <button
                  ref="home"
                  type="button"
                  class="text-3xl lg:text-7xl font-black capitalize"
                  @click="navigateTo('web.landing')"
                  @mouseenter="handelHover($event)"
                  @mouseleave="handleHoverExit($event)"
                >
                  {{ $t('home') }}
                </button>
              </li>
              <li
                class="
                  overflow-hidden
                  h-16
                  lg:h-32
                  w-max
                  relative
                  flex
                  items-center
                  cursor-pointer
                  hover:text-neutral
                "
              >
                <button
                  ref="ourStore"
                  type="button"
                  class="text-3xl lg:text-7xl font-black capitalize"
                  @click="navigateTo('web.store')"
                  @mouseenter="handelHover($event)"
                  @mouseleave="handleHoverExit($event)"
                >
                  {{ $t('our_store') }}
                </button>
              </li>
              <li
                class="
                  overflow-hidden
                  h-16
                  lg:h-32
                  w-max
                  relative
                  flex
                  items-center
                  cursor-pointer
                  hover:text-neutral
                "
              >
                <button
                  ref="collections"
                  type="button"
                  class="text-3xl lg:text-7xl font-black capitalize"
                  @click="navigateTo('web.collections')"
                  @mouseenter="handelHover($event)"
                  @mouseleave="handleHoverExit($event)"
                >
                  {{ $t('collections') }}
                </button>
              </li>
              <li
                class="
                  overflow-hidden
                  h-16
                  lg:h-32
                  w-max
                  relative
                  flex
                  items-center
                  cursor-pointer
                  hover:text-neutral
                "
              >
                <button
                  ref="ourPackages"
                  type="button"
                  class="text-3xl lg:text-7xl font-black capitalize"
                  @click="navigateTo('web.packages')"
                  @mouseenter="handelHover($event)"
                  @mouseleave="handleHoverExit($event)"
                >
                  {{ $t('our_packages') }}
                </button>
              </li>
            </ul>
          </nav>
          <div class="htw-menu__footer lg:w-auto lg:py-8">
            <ul
              class="
                flex flex-col
                lg:flex-row
                space-y-4
                lg:space-y-0 lg:space-x-8
                font-semibold
              "
            >
              <template v-if="!$page.props.user">
                <li>
                  <button
                    class="
                      uppercase
                      font-bold
                      cursor-pointer
                      transition-all
                      duration-300
                      ease-in-out
                      hover:bg-neutral hover:py-1 hover:px-2 hover:rounded-btn
                    "
                    @click="navigateTo('auth')"
                  >
                    {{ $t('login') }}
                  </button>
                </li>
                <li>
                  <button
                    class="
                      uppercase
                      font-bold
                      cursor-pointer
                      transition-all
                      duration-300
                      ease-in-out
                      hover:bg-neutral hover:py-1 hover:px-2 hover:rounded-btn
                    "
                    @click="navigateTo('auth')"
                  >
                    {{ $t('register') }}
                  </button>
                </li>
              </template>
              <li>
                <button
                  class="
                    uppercase
                    font-bold
                    cursor-pointer
                    transition-all
                    duration-300
                    ease-in-out
                    hover:bg-neutral hover:py-1 hover:px-2 hover:rounded-btn
                  "
                  @click="navigateTo('web.landing')"
                >
                  {{ $t('blog') }}
                </button>
              </li>
              <li>
                <button
                  class="
                    uppercase
                    font-bold
                    cursor-pointer
                    transition-all
                    duration-300
                    ease-in-out
                    hover:bg-neutral hover:py-1 hover:px-2 hover:rounded-btn
                  "
                  @click="navigateTo('web.landing')"
                >
                  {{ $t('about') }}
                </button>
              </li>
              <li>
                <button
                  class="
                    uppercase
                    font-bold
                    cursor-pointer
                    transition-all
                    duration-300
                    ease-in-out
                    hover:bg-neutral hover:py-1 hover:px-2 hover:rounded-btn
                  "
                  @click="navigateTo('web.landing')"
                >
                  {{ $t('terms') }}
                </button>
              </li>
              <li>
                <button
                  class="
                    uppercase
                    font-bold
                    cursor-pointer
                    transition-all
                    duration-300
                    ease-in-out
                    hover:bg-neutral hover:py-1 hover:px-2 hover:rounded-btn
                  "
                  @click="navigateTo('web.landing')"
                >
                  {{ $t('privacy') }}
                </button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed, onMounted, ref, reactive, watch } from 'vue'
import { useStore } from 'vuex'
import { Link, usePage } from '@inertiajs/inertia-vue3'
import gsap from 'gsap'
import LanguageSwitcher from '@/Shared/Partials/LanguageSwitcher'
import UserAreaDropdown from '@/Shared/UI/UserAreaDropdown'
import { Inertia } from '@inertiajs/inertia'

const components = { Link, LanguageSwitcher, UserAreaDropdown }

export default {
  name: 'WebHeader',

  components,

  setup() {
    const store = useStore()
    const page = usePage()
    // menu init vars
    const menuWrap = ref(null)
    const menuBlackBg = ref(null)
    const menuContent = ref(null)
    const home = ref(null)
    const ourStore = ref(null)
    const collections = ref(null)
    const ourPackages = ref(null)
    const disabled = ref(false)
    const cities = reactive([
      {
        ar_name: 'مدينة الكويت',
        en_name: 'kuwait city',
        img: '/images/cities/austin.webp',
      },
      {
        ar_name: 'الجهراء',
        en_name: 'aljahra',
        img: '/images/cities/beijing.webp',
      },
      {
        ar_name: 'الفروانية',
        en_name: 'alfarwaniyah',
        img: '/images/cities/dallas.webp',
      },
      {
        ar_name: 'حولي',
        en_name: 'hawli',
        img: '/images/cities/newyork.webp',
      },
      {
        ar_name: 'مبارك الكبير',
        en_name: 'mubarak alkabir',
        img: '/images/cities/sanfrancisco.webp',
      },
      {
        ar_name: 'الاحمدي',
        en_name: 'alahmadi',
        img: '/images/cities/newyork.webp',
      },
    ])

    // menu animation
    const isMenuOpen = computed(() => {
      return store.state.isWebMenuOpen
    })
    const toggleWebMenu = () => {
      store.commit('toggleWebMenu')
    }
    // if menu closed and goes to open
    const staggerRevealClose = (node1, node2) => {
      gsap.to([node1, node2], {
        duration: 0.8,
        height: 0,
        ease: 'power3.inOut',
        stagger: {
          amount: 0.05,
        },
      })
    }
    // if menu open
    const staggerReveal = (node1, node2) => {
      gsap.from([node1, node2], {
        duration: 0.8,
        height: 0,
        transformOrigin: 'right top',
        skewY: 3,
        ease: 'power3.inOut',
        stagger: {
          amount: 0.08,
        },
      })
    }
    // STAGGER THE LINKS TO APPEAR
    const staggerText = (node1, node2, node3, node4) => {
      gsap.from([node1, node2, node3, node4], {
        duration: 0.8,
        y: '8rem',
        delay: 0.2,
        ease: 'power3.inOut',
        stagger: {
          amount: 0.3,
        },
      })
    }

    watch(isMenuOpen, (val) => {
      if (val) {
        gsap.to(menuWrap.value, { duration: 0, css: { display: 'block' } })
        gsap.to(document.querySelector('body'), {
          duration: 0,
          css: { overflowY: 'hidden' },
        })
        //Allow menu to have height of 100%
        gsap.to([menuBlackBg.value, menuContent.value], {
          duration: 0,
          opacity: 1,
          height: '100%',
        })
        staggerReveal(menuBlackBg.value, menuContent.value)
        staggerText(
          home.value,
          ourStore.value,
          collections.value,
          ourPackages.value,
        )
      } else {
        staggerRevealClose(menuContent.value, menuBlackBg.value)
        gsap.to(menuWrap.value, { duration: 1, css: { display: 'none' } })
        gsap.to(document.querySelector('body'), {
          duration: 1,
          css: { overflowY: 'auto' },
        })
      }
    })

    const navigateTo = (routeName) => {
      store.commit('closeWebMenu')
      setTimeout(() => {
        Inertia.get(route(routeName))
      }, 1000)
    }

    // links hover anim
    const handelHover = (e) => {
      gsap.to(e.target, {
        duration: 0.3,
        y: 4,
        skewX: 5,
        ease: 'power1.inOut',
      })
    }

    // Hover off the link
    const handleHoverExit = (e) => {
      gsap.to(e.target, {
        duration: 0.3,
        y: -4,
        skewX: 0,
        ease: 'power1.inOut',
      })
    }

    // toggle bg city image on mouse enter
    const handleCityBg = (e, img) => {
      gsap.to(menuContent.value, {
        duration: 0.5,
        background: `url(${img}) center center`,
      })
      gsap.from(menuContent.value, {
        duration: 0.4,
        skewY: 2,
        transformOrigin: 'right top',
      })
    }
    // remove bg city image on mouse enter
    const handleCityBgReturn = () => {
      gsap.to(menuContent.value, {
        duration: 0,
        skewY: 0,
        backgroundImage: null,
        backgroundColor: '#ff9900',
      })
    }

    const getCartItemsCount = computed(() => {
      return store.state.cartCount
    })

    onMounted(() => {
      store.commit('updateCartCount', page.props.value.cartCount)
    })

    return {
      menuWrap,
      menuBlackBg,
      menuContent,
      isMenuOpen,
      toggleWebMenu,
      home,
      ourStore,
      ourPackages,
      collections,
      disabled,
      handelHover,
      handleHoverExit,
      cities,
      handleCityBg,
      handleCityBgReturn,
      navigateTo,
      getCartItemsCount,
    }
  },
}
</script>
