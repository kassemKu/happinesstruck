<template>
  <WebLayout>
    <Head title="BOOKING">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__collection mt-36">
      <HtSection>
        <div class="flex flex-col space-y-12">
          <div class="flex space-x-4">
            <div class="order-last sticky top-36 ml-4">
              <div class="w-96">
                <div class="mb-4">
                  <h2 class="text-lg capitalize font-semibold text-info">
                    cart total
                  </h2>
                </div>
                <div
                  class="
                    divide-y-2
                    border-2
                    rounded-box
                    p-4
                    uppercase
                    font-semibold
                    text-sm
                  "
                >
                  <div
                    v-for="packg in form.packages"
                    :key="packg.id"
                    class="flex justify-between py-4 items-center"
                  >
                    <p>
                      {{ packg.en_name }}
                      <span class="text-warning">
                        ({{ packg.price_per_event }} X
                        {{ packg.quantity }})</span
                      >
                    </p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      {{
                        getPackageTotalPrice(
                          packg.price_per_event,
                          packg.quantity,
                        )
                      }}
                      dk
                    </p>
                  </div>
                  <div class="flex justify-between py-4 items-center">
                    <p>subtotal</p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      {{ getCollectionSubtotal() }} dk
                    </p>
                  </div>
                  <div class="flex justify-between py-4 items-center">
                    <p>total</p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      {{ getCollectionSubtotal() }} dk
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- cart total -->
            <div class="w-full">
              <div class="mb-4">
                <h2 class="text-lg capitalize font-semibold text-info">
                  booking aummary
                </h2>
              </div>
              <div class="grid grid-cols-2 gap-x-4">
                <div
                  v-for="packg in form.packages"
                  :key="packg.id"
                  class="flex flex-col space-y-4"
                >
                  <img
                    :src="packg.media[0].full_url"
                    :alt="packg.en_name"
                    class="h-96 object-cover rounded-box"
                  />
                  <div
                    v-show="
                      packg.en_name === 'package picasso' ||
                      packg.ar_name === 'باكاج بيكاسو'
                    "
                    class="flex justify-between"
                  >
                    <button
                      type="button"
                      class="
                        btn
                        border-info
                        text-info
                        space-x-2
                        bg-transparent
                        border-2
                        hover:text-base-100 hover:bg-info hover:border-info
                      "
                      @click="increasePicassoPackage(packg)"
                    >
                      <VueFeather
                        type="plus"
                        stroke-width="3"
                        class="w-5 h-5"
                      />
                      <span>increase one more</span>
                    </button>
                    <button
                      type="button"
                      class="
                        btn
                        border-red-500
                        text-red-500
                        space-x-2
                        bg-transparent
                        border-2
                        hover:text-base-100
                        hover:bg-red-500
                        hover:border-red-500
                      "
                      :disabled="packg.quantity <= 5 ? 'disabled' : null"
                      @click="decreasePicassoPackage(packg)"
                    >
                      <VueFeather
                        type="minus"
                        stroke-width="3"
                        class="w-5 h-5"
                      />
                      <span>decrease one</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- booking summary -->
          </div>

          <form @submit.prevent="storeBooking">
            <div class="grid grid-cols-2 gap-x-8">
              <div>
                <div class="mb-4">
                  <h2 class="text-lg capitalize font-semibold text-info">
                    user information
                  </h2>
                </div>
                <div class="grid grid-cols-2 gap-x-4 items-center">
                  <TextField
                    v-model="form.full_name"
                    name="full_name"
                    :placeholder="'full name'"
                    :label="'full name'"
                    :server-error="$page.props.errors.ar_name"
                  />
                  <TextField
                    v-model="form.email"
                    name="email"
                    :type="'email'"
                    :placeholder="'email'"
                    :label="'email'"
                    :server-error="$page.props.errors.email"
                  />
                  <TextField
                    v-model="form.mobile"
                    name="mobile"
                    :type="'phone'"
                    :placeholder="'mobile'"
                    :label="'mobile'"
                    :server-error="$page.props.errors.mobile"
                  />
                </div>
                <!-- form grid -->
              </div>
              <!-- user details -->
              <div>
                <div class="mb-4">
                  <h2 class="text-lg capitalize font-semibold text-info">
                    event information
                  </h2>
                </div>
                <div class="grid grid-cols-2 gap-x-4 items-center">
                  <TextField
                    v-model="form.event_title"
                    name="event_title"
                    :placeholder="$t('event_title')"
                    :label="$t('event_title')"
                    :server-error="$page.props.errors.event_title"
                  />
                  <!-- event title -->
                  <div></div>
                  <HTextarea
                    v-model="form.event_description"
                    optional
                    name="event_description"
                    :placeholder="$t('event_description')"
                    :label="$t('event_description')"
                    :server-error="$page.props.errors.event_description"
                  />
                  <!-- event description -->
                  <div></div>
                  <div class="w-full relative mt-1">
                    <Listbox v-model="form.event_location">
                      <ListboxButton
                        class="
                          w-full
                          input
                          border border-base-300 border-2
                          bg-transparent
                          hover:border-neutral hover:border-opacity-50
                          shadow-sm
                        "
                      >
                        <span class="block truncate text-left">{{
                          form.event_location.en_name
                        }}</span>
                        <span
                          class="
                            absolute
                            inset-y-0
                            right-0
                            flex
                            items-center
                            pr-2
                            pointer-events-none
                          "
                        >
                          <VueFeather
                            type="chevron-down"
                            class="w-5 h-5 text-gray-400"
                            aria-hidden="true"
                          />
                        </span>
                      </ListboxButton>
                      <transition
                        leave-active-class="transition duration-100 ease-in"
                        leave-from-class="opacity-100"
                        leave-to-class="opacity-0"
                      >
                        <ListboxOptions
                          class="
                            ht-scrollbar
                            z-40
                            absolute
                            w-full
                            py-1
                            mt-1
                            overflow-auto
                            text-base
                            bg-white
                            rounded-md
                            shadow-lg
                            max-h-60
                            ring-1 ring-black ring-opacity-5
                            focus:outline-none
                            sm:text-sm
                          "
                        >
                          <ListboxOption
                            v-for="location in locations"
                            :key="location.en_name"
                            v-slot="{ active, selected }"
                            :value="location"
                            as="template"
                          >
                            <li
                              :class="[
                                active
                                  ? 'text-yellow-900 bg-yellow-100'
                                  : 'text-gray-900',
                                'cursor-default select-none relative py-2 pl-10 pr-4',
                              ]"
                            >
                              <span
                                :class="[
                                  selected ? 'font-medium' : 'font-normal',
                                  'block truncate',
                                ]"
                                >{{ location.en_name }}</span
                              >
                              <span
                                v-if="selected"
                                class="
                                  absolute
                                  inset-y-0
                                  left-0
                                  flex
                                  items-center
                                  pl-3
                                  text-amber-600
                                "
                              >
                                <VueFeather
                                  type="check"
                                  class="w-5 h-5"
                                  aria-hidden="true"
                                />
                              </span>
                            </li>
                          </ListboxOption>
                        </ListboxOptions>
                      </transition>
                    </Listbox>
                  </div>
                  <!-- event location -->
                  <TextField
                    v-model="form.event_address"
                    name="event_address"
                    :placeholder="$t('event_address')"
                    :label="$t('event_address')"
                    :server-error="$page.props.errors.event_address"
                  />
                  <!-- event address -->
                  <div class="flex">
                    <Datepicker v-model="form.event_start_date" :is24="false" />
                  </div>
                  <!-- event start date -->
                  <div class="flex">
                    <Datepicker v-model="form.event_end_date" :is24="false" />
                  </div>
                  <!-- event end date -->
                </div>
                <!-- form grid -->
              </div>
              <!-- event details -->
            </div>
            <div class="w-full flex items-center justify-center mt-8">
              <button type="submit" class="btn btn-info btn-wide">
                proceed to checkout
              </button>
            </div>
          </form>
          <!-- event and user details -->
        </div>
      </HtSection>
    </div>
  </WebLayout>
</template>

<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import { onMounted, ref } from 'vue'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'
import TextField from '@/Shared/UI/TextField'
import HTextarea from '@/Shared/UI/HTextarea'
import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue'
import { useCookie } from 'vue-cookie-next'

const components = {
  Head,
  Link,
  WebLayout,
  HtSection,
  HTextarea,
  TextField,
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
}

export default {
  name: 'WebBookingPage',

  components,

  props: {
    collection: {
      type: Object,
      default: () => ({}),
    },
  },

  setup(props) {
    const form = useForm({
      event_title: null,
      event_description: null,
      event_location: null,
      event_address: null,
      event_start_date: new Date(),
      event_end_date: new Date(),
      packages: [],
      full_name: null,
      email: null,
      mobile: null,
    })

    const locations = [
      {
        ar_name: 'مدينة الكويت',
        en_name: 'kuwait city',
        isAvailable: true,
      },
      {
        ar_name: 'الجهراء',
        en_name: 'aljahra',
        isAvailable: false,
      },
      {
        ar_name: 'الفروانية',
        en_name: 'alfarwaniyah',
        isAvailable: false,
      },
      {
        ar_name: 'حولي',
        en_name: 'hawli',
        isAvailable: false,
      },
      {
        ar_name: 'مبارك الكبير',
        en_name: 'mubarak alkabir',
        isAvailable: false,
      },
      {
        ar_name: 'الاحمدي',
        en_name: 'alahmadi',
        isAvailable: false,
      },
      {
        ar_name: 'السالمية',
        en_name: 'alsalimya',
        isAvailable: false,
      },
      {
        ar_name: 'ضاحية صباح السالم',
        en_name: 'dahyat sabah alsalem',
        isAvailable: false,
      },
      {
        ar_name: 'الفحيحيل',
        en_name: 'alfuhayhil',
        isAvailable: false,
      },
      {
        ar_name: 'سلوى',
        en_name: 'salwa',
        isAvailable: false,
      },
    ]

    form.event_location = ref(locations[0])

    const { setCookie } = useCookie()

    const convertDataToArray = (data) => {
      if (Array.isArray(data)) return data
      return Object.values(data)
    }

    const getPackageTotalPrice = (price, quantity) => {
      return price * quantity
    }

    const getCollectionSubtotal = () => {
      let subtotal = 0

      form.packages.forEach((item) => {
        subtotal += item.quantity * item.price_per_event
      })

      return subtotal
    }

    const increasePicassoPackage = (packg) => {
      return (packg.quantity += 1)
    }

    const decreasePicassoPackage = (packg) => {
      if (packg.quantity <= 5) return
      return (packg.quantity -= 1)
    }

    const storeBooking = () => {
      setCookie('booking', form)
      console.log(form)
      Inertia.get(route('web.bookingCheckout'))
    }

    onMounted(() => {
      convertDataToArray(props.collection[0]['packages']).forEach((item) => {
        form.packages.push(item)
      })
    })

    return {
      form,
      getPackageTotalPrice,
      getCollectionSubtotal,
      increasePicassoPackage,
      decreasePicassoPackage,
      locations,
      storeBooking,
    }
  },
}
</script>

<style scoped>
.htw-collection-package__img {
  width: 100%;
  height: 60vh;
}
</style>
