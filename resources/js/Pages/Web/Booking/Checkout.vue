<template>
  <WebLayout>
    <Head title="BOOKING">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__booking-checkout mt-36">
      <HtSection>
        <div class="w-full flex items-center justify-center mb-8">
          <div class="text-center">
            <h3 class="text-xl font-bold capitalize">
              complete your booking request
            </h3>
            <p class="font=semibold">final step to create awesome event</p>
          </div>
        </div>
        <!-- page title -->
        <div>
          <div class="flex space-x-8">
            <div class="flex-1">
              <form>
                <div class="grid grid-cols-2 gap-8">
                  <div>
                    <div class="mb-6">
                      <h2 class="text-lg capitalize font-semibold text-info">
                        event information
                      </h2>
                    </div>
                    <div class="form-control">
                      <label
                        class="cursor-pointer label justify-start space-x-2"
                      >
                        <input
                          v-model="policyAgree"
                          type="checkbox"
                          class="checkbox"
                          :checked="policyAgree"
                        />
                        <span
                          class="label-text text-sm font-semibold capitalize"
                          >you agree happiness truck company policy</span
                        >
                      </label>
                    </div>

                    <TextField
                      v-model="form.event_title"
                      name="event_title"
                      :placeholder="'event title'"
                      :label="'event title'"
                      :server-error="$page.props.errors.event_title"
                    />
                    <!-- event title -->
                    <TextField
                      v-model="form.event_kids_count"
                      name="event_kids_count"
                      type="number"
                      :placeholder="'kids count in the event'"
                      :label="'kids count in the event'"
                      :server-error="$page.props.errors.event_kids_count"
                    />
                    <!-- kids count -->
                    <div class="form-control mb-4">
                      <label class="label">
                        <span class="label-text capitalize font-semibold"
                          >event city</span
                        >
                      </label>
                      <Listbox v-model="form.event_city">
                        <div class="relative mt-1">
                          <ListboxButton
                            class="
                              relative
                              w-full
                              input
                              border-base-300 border-2
                              bg-transparent
                              hover:border-neutral hover:border-opacity-50
                              shadow-sm
                            "
                          >
                            <span class="block truncate text-left">{{
                              form.event_city.en_name
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
                                stroke-width="3"
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
                                absolute
                                z-30
                                ht-scrollbar
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
                                v-for="city in cities"
                                v-slot="{ active, selected }"
                                :key="city.en_name"
                                :value="city"
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
                                    >{{ city.en_name }}</span
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
                                      text-yellow-600
                                    "
                                  >
                                    <VueFeather
                                      type="check"
                                      stroke-width="3"
                                      class="w-5 h-5"
                                      aria-hidden="true"
                                    />
                                  </span>
                                </li>
                              </ListboxOption>
                            </ListboxOptions>
                          </transition>
                        </div>
                      </Listbox>
                    </div>
                    <!-- event city select -->
                    <div class="form-control mb-4">
                      <label class="label">
                        <span class="label-text capitalize font-semibold"
                          >event aria</span
                        >
                      </label>
                      <Listbox v-model="form.event_aria">
                        <div class="relative mt-1">
                          <ListboxButton
                            class="
                              relative
                              w-full
                              input
                              border-base-300 border-2
                              bg-transparent
                              hover:border-neutral hover:border-opacity-50
                              shadow-sm
                            "
                          >
                            <span class="block truncate text-left">{{
                              form.event_aria
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
                                stroke-width="3"
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
                                absolute
                                z-30
                                ht-scrollbar
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
                                v-for="aria in form.arias"
                                v-slot="{ active, selected }"
                                :key="aria.en_name"
                                :value="aria"
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
                                    >{{ aria.en_name }}</span
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
                                      text-yellow-600
                                    "
                                  >
                                    <VueFeather
                                      type="check"
                                      stroke-width="3"
                                      class="w-5 h-5"
                                      aria-hidden="true"
                                    />
                                  </span>
                                </li>
                              </ListboxOption>
                            </ListboxOptions>
                          </transition>
                        </div>
                      </Listbox>
                    </div>
                    <!-- event aria select -->
                    <TextField
                      v-model="form.event_Avenue"
                      name="event_Avenue"
                      type="text"
                      :placeholder="'event Avenue'"
                      :label="'event Avenue'"
                      :server-error="$page.props.errors.event_Avenue"
                    />
                    <!-- event Avenue -->
                    <TextField
                      v-model="form.event_street"
                      name="event_street"
                      type="text"
                      :placeholder="'street'"
                      :label="'street'"
                      :server-error="$page.props.errors.event_street"
                    />
                    <!-- event street -->
                    <TextField
                      v-model="form.event_house_number"
                      name="event_house_number"
                      type="text"
                      :placeholder="'house number'"
                      :label="'house number'"
                      :server-error="$page.props.errors.event_house_number"
                    />
                    <!-- event house number -->
                    <div class="form-control mb-4">
                      <label class="label">
                        <span class="label-text capitalize font-semibold"
                          >event date</span
                        >
                      </label>
                      <litepie-datepicker
                        v-model="form.event_date"
                        :formatter="formatter"
                        as-single
                      ></litepie-datepicker>
                    </div>
                    <!-- event date -->
                    <div class="form-control mb-4">
                      <label class="label">
                        <span class="label-text capitalize font-semibold"
                          >event time</span
                        >
                      </label>
                      <Listbox v-model="form.event_time">
                        <div class="relative mt-1">
                          <ListboxButton
                            class="
                              relative
                              w-full
                              input
                              border-base-300 border-2
                              bg-transparent
                              hover:border-neutral hover:border-opacity-50
                              shadow-sm
                            "
                          >
                            <span class="block truncate text-left">{{
                              form.event_time
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
                                stroke-width="3"
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
                                absolute
                                z-30
                                ht-scrollbar
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
                                v-for="(time, index) in times"
                                v-slot="{ active, selected }"
                                :key="index"
                                :value="time"
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
                                    >{{ time }}</span
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
                                      text-yellow-600
                                    "
                                  >
                                    <VueFeather
                                      type="check"
                                      stroke-width="3"
                                      class="w-5 h-5"
                                      aria-hidden="true"
                                    />
                                  </span>
                                </li>
                              </ListboxOption>
                            </ListboxOptions>
                          </transition>
                        </div>
                      </Listbox>
                    </div>
                    <!-- event time -->
                    <HTextarea
                      v-model="form.description"
                      name="description"
                      :placeholder="'description'"
                      :label="'description'"
                      optional
                      :server-error="$page.props.errors.description"
                    />
                  </div>
                  <!-- event details -->
                  <div>
                    <div class="mb-6">
                      <h2 class="text-lg capitalize font-semibold text-info">
                        billing information
                      </h2>
                    </div>
                    <div class="form-control">
                      <label
                        class="cursor-pointer label justify-start space-x-2"
                      >
                        <input
                          v-model="useUserInfo"
                          type="checkbox"
                          class="checkbox"
                          :checked="useUserInfo"
                        />
                        <span
                          class="label-text text-sm font-semibold capitalize"
                          >use your happiness truck account details?</span
                        >
                      </label>
                    </div>

                    <TextField
                      v-model="form.full_name"
                      name="full_name"
                      :placeholder="'full name'"
                      :label="'full name'"
                      :server-error="$page.props.errors.full_name"
                    />
                    <TextField
                      v-model="form.email"
                      name="email"
                      type="email"
                      :placeholder="'email'"
                      :label="'email'"
                      :server-error="$page.props.errors.email"
                    />
                    <TextField
                      v-model="form.mobile"
                      name="mobile"
                      type="phone"
                      :placeholder="'mobile'"
                      :label="'mobile'"
                      :server-error="$page.props.errors.mobile"
                    />
                  </div>
                  <!-- billing details -->
                </div>
                <div class="w-full flex items-center justify-center">
                  <button
                    type="submit"
                    class="
                      btn btn-wide
                      space-x-2
                      bg-info
                      border-2 border-info
                      hover:bg-transparent hover:border-info hover:text-info
                    "
                  >
                    <span>pay now</span>
                  </button>
                </div>
              </form>
            </div>
            <div class="w-96 sticky top-36 h-96">
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
                <template v-if="form.packages.length > 0">
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
                      {{ packg.price_per_event * packg.quantity }}
                      dk
                    </p>
                  </div>
                </template>
                <template v-else>
                  <div class="text-center py-4">
                    <p class="text-error">no items in this booking!</p>
                  </div>
                </template>
                <div v-show="form.packages.length > 0">
                  <div
                    class="flex justify-between py-4 items-center"
                    :class="{ 'line-through': !form.subtotal }"
                  >
                    <p>subtotal</p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      {{ form.subtotal }} dk
                    </p>
                  </div>
                  <div
                    v-show="form.couponValue"
                    class="flex justify-between py-4 items-center text-error"
                  >
                    <p>coupon value</p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      - {{ form.couponValue }} dk
                    </p>
                  </div>
                  <div class="form-control py-4">
                    <label class="cursor-pointer label justify-start space-x-2">
                      <input
                        v-model="form.hasCoupon"
                        type="checkbox"
                        class="checkbox checkbox-sm checkbox-accent"
                        :checked="form.hasCoupon"
                      />
                      <span
                        class="
                          label-text
                          text-xm
                          font-semibold
                          capitalize
                          text-accent
                        "
                        >has coupon?</span
                      >
                    </label>
                  </div>
                  <form
                    v-show="form.hasCoupon"
                    class="py-4"
                    @submit.prevent="checkCoupon"
                  >
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">enter coupon code</span>
                      </label>
                      <div>
                        <div class="flex space-x-2">
                          <input
                            v-model="couponForm.code"
                            type="text"
                            placeholder="enter coupon code"
                            class="
                              w-full
                              input
                              border-base-300 border-2
                              bg-transparent
                              hover:border-neutral hover:border-opacity-50
                              shadow-sm
                            "
                          />
                          <button class="btn btn-info">apply</button>
                        </div>
                        <p
                          v-show="checkCouponError.length > 0"
                          class="text-error font-semibold text-xs capitalize"
                        >
                          {{ checkCouponError[0] }}
                        </p>
                      </div>
                    </div>
                  </form>
                </div>
                <div
                  class="flex justify-between py-4 items-center text-info"
                  :class="{ 'line-through': !form.subtotal }"
                >
                  <p>total</p>
                  <div class="flex space-x-2">
                    <p
                      v-show="form.couponValue"
                      class="
                        bg-error bg-opacity-10
                        py-1
                        px-2
                        rounded
                        line-through
                        text-error
                      "
                    >
                      {{ form.subtotal }} dk
                    </p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      {{ getBookingTotal }} dk
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- cart total -->
          </div>
        </div>
      </HtSection>
    </div>
  </WebLayout>
</template>

<script>
import { onMounted, ref, watch, computed, reactive } from 'vue'
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3'
import axios from 'axios'
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

const components = {
  Head,
  WebLayout,
  HtSection,
  TextField,
  HTextarea,
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
      event_kids_count: null,
      event_description: null,
      event_city: null,
      event_aria: null,
      event_address: null,
      event_house_number: null,
      event_date: '',
      event_time: null,
      packages: [],
      subtotal: null,
      total: null,
      full_name: null,
      mobile: null,
      email: null,
      arias: [],
      hasCoupon: false,
      couponValue: null,
    })

    const page = usePage()

    const useUserInfo = ref(false)
    const policyAgree = ref(true)
    const couponForm = reactive({
      code: null,
    })

    const checkCouponError = reactive([])

    const user = computed(() => page.props.value.user)

    watch(useUserInfo, () => {
      form.full_name = !useUserInfo.value ? null : user.value.full_name
      form.email = !useUserInfo.value ? null : user.value.email
      form.mobile = !useUserInfo.value ? null : user.value.mobile
    })

    // cities
    const cities = reactive([
      {
        ar_name: 'مدينة الكويت',
        en_name: 'kuwait city',
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
        en_name: 'aljahra',
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
        en_name: 'alfarwaniyah',
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
        en_name: 'hawli',
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
        en_name: 'mubarak alkabir',
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
        en_name: 'alahmadi',
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
        en_name: 'alsalimya',
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
    ])
    form.event_city = cities[0]

    // aria
    const kuwaitCity = [
      {
        ar_name: 'الخالدية',
        en_name: 'AlKhalidaia',
        isAvailable: true,
      },
      {
        ar_name: 'الدسمة',
        en_name: 'AlDasmah',
        isAvailable: true,
      },
      {
        ar_name: 'الدعية',
        en_name: 'AlDaaiah',
        isAvailable: true,
      },
      {
        ar_name: 'الدوحة',
        en_name: 'AlDoha',
        isAvailable: true,
      },
    ]

    const aljahraCity = [
      {
        ar_name: 'الجهراء',
        en_name: 'aljahra',
        isAvailable: true,
      },
      {
        ar_name: 'الصبية',
        en_name: 'aljahra',
        isAvailable: true,
      },
      {
        ar_name: 'الصبية',
        en_name: 'aljahra',
        isAvailable: true,
      },
      {
        ar_name: 'الصبية الصناعية',
        en_name: 'aljahra',
        isAvailable: true,
      },
    ]

    const alfarwaniyahCity = [
      {
        ar_name: 'أبرق خيطان',
        en_name: 'AlKhalidaia',
        isAvailable: true,
      },
      {
        ar_name: 'اشبيليا',
        en_name: 'AlKhalidaia',
        isAvailable: true,
      },
      {
        ar_name: 'الاندلس',
        en_name: 'AlKhalidaia',
        isAvailable: true,
      },
      {
        ar_name: 'الخالدية',
        en_name: 'AlKhalidaia',
        isAvailable: true,
      },
    ]

    watch(
      () => form.event_city,
      (newVal) => {
        switch (newVal.en_name) {
          case 'aljahra':
            console.log('yes')
            form.arias = []
            aljahraCity.forEach((n) => form.arias.push(n))
            break
          case 'alfarwaniyah':
            form.arias = []
            alfarwaniyahCity.forEach((n) => form.arias.push(n))
            break
          case 'hawli':
            console.log('hawli')
            break
          case 'mubarak alkabir':
            console.log('mubarak alkabir')
            break
          case 'alahmadi':
            console.log('alahmadi')
            break
          case 'alsalimya':
            console.log('alsalimya')
            break
          case 'dahyat sabah alsalem':
            console.log('dahyat sabah alsalem')
            break
          case 'alfuhayhil':
            console.log('alfuhayhil')
            break
          case 'salwa':
            console.log('salwa')
            break
          default:
            form.arias
        }
      },
      {
        immediate: true,
        deep: false,
      },
    )

    // event date
    const formatter = {
      date: 'DD MMM YYYY',
      month: 'MMM',
    }

    // event times
    const times = [
      'from 9 PM TO 12 AM',
      'from 12 AM TO 3 AM',
      'from 3 AM TO 6 AM',
      'from 6 AM TO 9 AM',
      'from 9 AM TO 12 AM',
    ]

    form.event_time = ref(times[0])

    // check coupon
    const checkCoupon = () => {
      axios
        .post(route('web.checkCoupon'), couponForm)
        .then((res) => {
          form.couponValue = res.data.coupon.value
          form.hasCoupon = false
        })
        .catch((error) => {
          if (error.response) {
            // TODO:: To display target error mesage
            checkCouponError.push(error.response.data.errors.code[0])
            console.log(error.response.data)
            console.log(error.response.status)
            console.log(error.response.headers)
          }
        })
    }

    const getBookingTotal = computed(() => {
      let total = form.subtotal

      if (form.couponValue) {
        total = form.subtotal - form.couponValue
      }
      return total
    })

    onMounted(() => {
      if (props.collection && Object.keys(props.collection).length > 0) {
        form.subtotal = props.collection.subtotal
        props.collection.packages.forEach((item) => {
          form.packages.push(item)
        })
      }
      kuwaitCity.forEach((n) => form.arias.push(n))
      form.event_aria = form.arias[0]
    })

    return {
      form,
      useUserInfo,
      page,
      policyAgree,
      cities,
      kuwaitCity,
      aljahraCity,
      alfarwaniyahCity,
      formatter,
      times,
      getBookingTotal,
      checkCoupon,
      couponForm,
      checkCouponError,
    }
  },
}
</script>
