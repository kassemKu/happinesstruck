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
                  <!-- <div class="w-full relative mt-1">
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
                  </div> -->
                  <div class="form-control mb-4">
                    <label class="label">
                      <span class="label-text capitalize font-semibold"
                        >state and city</span
                      ></label
                    >
                    <Multiselect
                      v-model="form.event_location"
                      :groups="true"
                      :options="states"
                      placeholder="select state and city"
                    >
                    </Multiselect>
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
                  <div class="form-control mb-4">
                    <label class="label">
                      <span class="label-text capitalize font-semibold"
                        >event date</span
                      ></label
                    >
                    <litepie-datepicker
                      v-model="form.date"
                      placeholder="choice event date"
                      :formatter="formatter"
                      as-single
                    ></litepie-datepicker>
                  </div>
                  <!-- event date -->
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
import { onMounted } from 'vue'
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
import Multiselect from '@vueform/multiselect'

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
  Multiselect,
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
      date: null,
      packages: [],
      subtotal: null,
      total: null,
      full_name: null,
      email: null,
      mobile: null,
    })

    const states = [
      {
        ar_name: 'مدينة الكويت',
        label: 'kuwait city',
        isAvailable: true,
        options: [
          'الخالدية - مدينة الكويت',
          'الدسمة - مدينة الكويت',
          'الدعية - مدينة الكويت',
          'الدوحة - مدينة الكويت',
          'الروضة - مدينة الكويت',
          'الري - مدينة الكويت',
          'السرة - مدينة الكويت',
          'الشامية - مدينة الكويت',
          'الشويخ - مدينة الكويت',
          'الصالحية - مدينة الكويت',
          'الصليبيخات - مدينة الكويت',
          'الصوابر - مدينة الكويت',
          'العديلية - مدينة الكويت',
          'الفيحاء - مدينة الكويت',
          'القادسيىة - مدينة الكويت',
          'القبلة - مدينة الكويت',
          'القيروان - مدينة الكويت',
          'المرقاب - مدينة الكويت',
          'المنصورية - مدينة الكويت',
          'النزهة - مدينة الكويت',
          'النهضة - مدينة الكويت',
          'اليرموك - مدينة الكويت',
          'بنيد القار - مدينة الكويت',
          'جابر الأحمد - مدينة الكويت',
          'دسمان - مدينة الكويت',
          'شرق - مدينة الكويت',
          'عبدالله السالم - مدينة الكويت',
          'غرب الصليبيخات - مدينة الكويت',
          'غرناطة - مدينة الكويت',
          'قرطبة - مدينة الكويت',
          'كيفان - مدينة الكويت',
          'مدينة الكويت - مدينة الكويت',
        ],
      },
      {
        ar_name: 'الجهراء',
        label: 'aljahra',
        isAvailable: false,
        options: [
          'الجهراء - الجهراء',
          'الصبية - الجهراء',
          'الصليبة - الجهراء',
          'الصليبة الصناعية - الجهراء',
          'الصليبة الزراعية - الجهراء',
          'العبداي - الجهراء',
          'العيون - الجهراء',
          'المطلاع - الجهراء',
          'النسيم - الجهراء',
          'النعيم - الجهراء',
          'الواحة - الجهراء',
          'أمغرة - الجهراء',
          'تيماء - الجهراء',
          'سعد العبدالله - الجهراء',
          'قصر - الجهراء',
          'قيروان جنوب الدوحة - الجهراء',
          'كبد - الجهراء',
          'مطار الشيخ سعد العبدالله - الجهراء',
        ],
      },
      {
        ar_name: 'الفروانية',
        label: 'alfarwaniyah',
        isAvailable: false,
        options: [
          'أبرق خيطان - الفروانية',
          'اشبيليا - الفروانية',
          'الاندلس - الفروانية',
          'الرابية - الفروانية',
          'الرحاب - الفروانية',
          'الرفعي - الفروانية',
          'الري الصناعية - الفروانية',
          'الشدادية - الفروانية',
          'الضجيج - الفروانية',
          'العارضية - الفروانية',
          'العارضية الصناعية - الفروانية',
          'العمرية - الفروانية',
          'الفردوس - الفروانية',
          'الفروانية - الفروانية',
          'المطار - الفروانية',
          'جليب شيوخ - الفروانية',
          'العارضية - الفروانية',
          'خيطان - الفروانية',
          'صباح الناصر - الفروانية',
          'عارضية مخازن - الفروانية',
          'عباسية - الفروانية',
          'عبدالله المبارك - الفروانية',
          'منطقة المعرض جنوبخيطان - الفروانية',
        ],
      },
      {
        ar_name: 'حولي',
        label: 'hawli',
        isAvailable: false,
        options: [
          'البدع - حولي',
          'الجابرية - حولي',
          'الرميثة - حولي',
          'الزهراء - حولي',
          'السالمية - حولي',
          'السلام - حولي',
          'الشعب - حولي',
          'الشهداء - حولي',
          'الصديق - حولي',
          'بيان - حولي',
          'حطين - حولي',
          'حولي - حولي',
          'سلوى - حولي',
          'مبارك العبدلله - حولي',
          'مشرف - حولي',
          'ميدان حولي - حولي',
        ],
      },
      {
        ar_name: 'مبارك الكبير',
        label: 'mubarak alkabir',
        isAvailable: false,
        options: [
          'أبو الحصانية - مبارك الكبير',
          'أبو فطيرة - مبارك الكبير',
          'العدان - مبارك الكبير',
          'الفنطاس - مبارك الكبير',
          'الفنيطيس - مبارك الكبير',
          'القرين - مبارك الكبير',
          'القصور - مبارك الكبير',
          'المسايل - مبارك الكبير',
          'المسيلة - مبارك الكبير',
          'جنوب الوسطى - مبارك الكبير',
          'صباح السالم - مبارك الكبير',
          'صبحان الصناعية - مبارك الكبير',
          'غرب أبو فطيرة - مبارك الكبير',
          'مبارك الكبير - مبارك الكبير',
          'وسطى - مبارك الكبير',
        ],
      },
      {
        ar_name: 'الاحمدي',
        label: 'alahmadi',
        isAvailable: false,
        options: [
          'أبو حليفة - الأحمدي',
          'الأحمدي - الأحمدي',
          'الخيزران - الأحمدي',
          'الرقة - الأحمدي',
          'الصباحية - الأحمدي',
          'الظهر - الأحمدي',
          'العقيلة - الأحمدي',
          'الفحيل - الأحمدي',
          'الفنطاس - الأحمدي',
          'المنقف - الأحمدي',
          'المهبولة - الأحمدي',
          'النويصب - الأحمدي',
          'الوفرة - الأحمدي',
          'بنيدر - الأحمدي',
          'جابر العلي - الأحمدي',
          'شرق الأحمدي - الأحمدي',
          'علي صباح السالم - الأحمدي',
          'فهد الأحمد - الأحمدي',
          'مدينة صباح الأحمد - الأحمدي',
          'مقوع - الأحمدي',
          'ميناء الأحدي - الأحمدي',
          'ميناء الشعيبة - الأحمدي',
          'ميناء عبدالله - الأحمدي',
          'هدية - الأحمدي',
        ],
      },
      {
        ar_name: 'السالمية',
        label: 'alsalimya',
        isAvailable: false,
        options: [
          'one in -alsalimya',
          'tow in -alsalimya',
          'three in -alsalimya',
          'four in -alsalimya',
        ],
      },
      {
        ar_name: 'ضاحية صباح السالم',
        label: 'dahyat sabah alsalem',
        isAvailable: false,
        options: [
          'one in - dahyat sabah alsalem',
          'tow in - dahyat sabah alsalem',
          'three in - dahyat sabah alsalem',
          'four in - dahyat sabah alsalem',
        ],
      },
      {
        ar_name: 'الفحيحيل',
        label: 'alfuhayhil',
        isAvailable: false,
        options: [
          'one in - alfuhayhil',
          'tow in - alfuhayhil',
          'three in - alfuhayhil',
          'four in - alfuhayhil',
        ],
      },
      {
        ar_name: 'سلوى',
        label: 'salwa',
        isAvailable: false,
        options: [
          'one in - salwa',
          'tow in - salwa',
          'three in - salwa',
          'four in - salwa',
        ],
      },
    ]

    // form.event_location = ref(states[0])

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

      form.subtotal = subtotal

      return subtotal
    }

    const increasePicassoPackage = (packg) => {
      return ++packg.quantity
    }

    const decreasePicassoPackage = (packg) => {
      if (packg.quantity <= 5) return
      return --packg.quantity
    }
    // date
    const formatter = {
      date: 'DD MMM YYYY',
      month: 'MMM',
    }

    const storeBooking = () => {
      setCookie('booking', form)

      form.post(route('web.storeBooking', { collection: props.collection }), {
        preserverState: true,
        onStart: () => console.log('Do Something on start'),
        onFinish: () => console.log('Do Something on finish'),
        onError: (errors) => {
          store.commit('openNotification', {
            title: 'something went wrong',
            type: 'error',
            content: errors,
          })
        },
        onSuccess: () => {
          if (
            page.props.errors &&
            Object.keys(page.props.errors).length === 0
          ) {
            form.reset()
            media = []
            form.mediaIds = []
            store.commit('openNotification', {
              title: 'create package',
              type: 'success',
              content: 'package created successfully',
            })
          }
        },
      })
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
      states,
      storeBooking,
      formatter,
    }
  },
}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.htw-collection-package__img {
  width: 100%;
  height: 60vh;
}
</style>
