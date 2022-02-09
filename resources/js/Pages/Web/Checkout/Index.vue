<template>
  <WebLayout>
    <Head title="Welcome">
      <meta title="CHECKOUT" content="lorem ipsum" />
    </Head>
    <div
      class="
        htw-page htw-checkout-page
        bg-base-300 bg-opacity-20
        my-6
        mx-8
        sm:mx-16
        rounded-box
      "
    >
      <HtSection :padding-x="16">
        <div class="flex flex-col space-y-8 -mx-4 md:-mx-0">
          <div
            class="w-full flex flex-col text-center items-center justify-center"
          >
            <h2 class="text-lg md:text-2xl capitalize font-bold leading-10">
              {{ $t('model_page', { model: $t('checkout') }) }}
            </h2>
            <p
              class="max-w-md text-neutral text-opacity-60 text-sm md:text-base"
            >
              {{ $t('lorem_11') }}
            </p>
          </div>
          <div
            class="
              bg-base-100
              p-4
              lg:p-8
              rounded-box
              flex flex-col
              lg:flex-row
              space-x-0
              lg:space-x-8
            "
          >
            <form class="w-full lg:w-2/3" @submit.prevent="checkout">
              <div class="flex flex-col space-y-8">
                <div class="flex flex-col space-y-4">
                  <h3 class="text-xl text-info font-bold uppercase">
                    {{ $t('shipping_details') }}
                  </h3>
                  <div class="form-control">
                    <label class="cursor-pointer label justify-start space-x-2">
                      <input
                        v-model="useUserInfo"
                        type="checkbox"
                        class="checkbox"
                        :checked="useUserInfo"
                      />
                      <span class="label-text text-xs font-medium capitalize">{{
                        $t('ask_to_user_account')
                      }}</span>
                    </label>
                  </div>
                  <div>
                    <TextField
                      v-model="form.shipping_full_name"
                      name="shipping_full_name"
                      :placeholder="$t('shipping') + ' | ' + $t('full_name')"
                      :label="$t('shipping') + ' | ' + $t('full_name')"
                      :server-error="$page.props.errors.shipping_full_name"
                    />
                    <div class="form-control mb-4">
                      <label class="label">
                        <span class="label-text capitalize font-semibold">{{
                          $t('shipping') + ' | ' + $t('country')
                        }}</span>
                        <Link
                          href="/"
                          class="
                            label-text-alt
                            capitalize
                            font-semibold
                            text-info
                          "
                        >
                          ({{ $t('shipping_cost') }})
                          {{ $t('check_shipping_price') }}
                        </Link>
                      </label>
                      <vue-select
                        v-model="form.shipping_country"
                        :options="shippingCountries"
                        value-by="ar_name"
                        :label-by="
                          $i18n.locale === 'en' ? 'en_name' : 'ar_name'
                        "
                        :placeholder="$t('shipping') + ' | ' + $t('country')"
                        close-on-select
                      ></vue-select>
                      <label class="label">
                        <span
                          v-show="$page.props.errors.shipping_country"
                          class="label-text-alt text-error"
                          >{{ $page.props.errors.shipping_country }}</span
                        >
                      </label>
                    </div>
                    <!-- shipping country -->
                    <div class="form-control mb-4">
                      <label class="label">
                        <span class="label-text capitalize font-semibold">{{
                          $t('shipping') + ' | ' + $t('state')
                        }}</span>
                        <Link
                          href="/"
                          class="
                            label-text-alt
                            capitalize
                            font-semibold
                            text-info
                          "
                        >
                          ({{ $t('shipping_cost') }})
                          {{ $t('check_shipping_price') }}
                        </Link>
                      </label>
                      <vue-select
                        v-model="form.shipping_state"
                        :options="shippingStates"
                        value-by="ar_name"
                        :label-by="
                          $i18n.locale === 'en' ? 'en_name' : 'ar_name'
                        "
                        :placeholder="$t('shipping') + ' | ' + $t('state')"
                        close-on-select
                        @selected="shippingStateSelected"
                        @removed="clearShippingStateSelected"
                      ></vue-select>
                      <label class="label">
                        <span
                          v-show="$page.props.errors.shipping_state"
                          class="label-text-alt text-error"
                          >{{ $page.props.errors.shipping_state }}</span
                        >
                      </label>
                    </div>
                    <!-- shipping state -->
                    <div class="form-control mb-4">
                      <label class="label">
                        <span class="label-text capitalize font-semibold">{{
                          $t('shipping') + ' | ' + $t('area')
                        }}</span>
                        <Link
                          href="/"
                          class="
                            label-text-alt
                            capitalize
                            font-semibold
                            text-info
                          "
                        >
                          ({{ $t('shipping_cost') }})
                          {{ $t('check_shipping_price') }}
                        </Link>
                      </label>
                      <vue-select
                        v-model="form.shipping_area"
                        :options="shippingAreas"
                        value-by="ar_name"
                        :label-by="
                          $i18n.locale === 'en' ? 'en_name' : 'ar_name'
                        "
                        :placeholder="$t('shipping') + ' | ' + $t('area')"
                        close-on-select
                        @selected="shippingAreaSelected"
                        @removed="clearShippingAreaSelected"
                      ></vue-select>
                      <label class="label">
                        <span
                          v-show="$page.props.errors.shipping_area"
                          class="label-text-alt text-error"
                          >{{ $page.props.errors.shipping_area }}</span
                        >
                      </label>
                    </div>
                    <!-- shipping area -->
                    <TextField
                      v-model="form.shipping_zip_code"
                      name="shipping_zip_code"
                      :placeholder="$t('shipping') + ' | ' + $t('zip_code')"
                      :label="$t('shipping') + ' | ' + $t('zip_code')"
                      :server-error="$page.props.errors.shipping_zip_code"
                    />
                    <TextField
                      v-model="form.shipping_avenue"
                      name="shipping_avenue"
                      :placeholder="$t('shipping') + ' | ' + $t('avenue')"
                      :label="$t('shipping') + ' | ' + $t('avenue')"
                      :server-error="$page.props.errors.shipping_avenue"
                    />
                    <TextField
                      v-model="form.shipping_street"
                      name="shipping_street"
                      :placeholder="$t('shipping') + ' | ' + $t('street')"
                      :label="$t('shipping') + ' | ' + $t('street')"
                      :server-error="$page.props.errors.shipping_street"
                    />
                    <TextField
                      v-model="form.shipping_address"
                      name="shipping_address"
                      :placeholder="$t('shipping') + ' | ' + $t('address')"
                      :label="$t('shipping') + ' | ' + $t('address')"
                      :server-error="$page.props.errors.shipping_address"
                    />
                    <TextField
                      v-model="form.shipping_phone"
                      name="shipping_phone"
                      :placeholder="$t('shipping') + ' | ' + $t('phone')"
                      :label="$t('shipping') + ' | ' + $t('phone')"
                      :server-error="$page.props.errors.shipping_phone"
                    />
                  </div>
                </div>
                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <input
                      v-model="form.useShippingDetails"
                      type="checkbox"
                      class="checkbox"
                      :checked="form.useShippingDetails"
                    />
                    <span class="label-text text-xs font-medium capitalize">{{
                      $t('same_shipping_details')
                    }}</span>
                  </label>
                </div>
                <!-- shipping details -->
                <div class="flex flex-col space-y-4">
                  <h3 class="text-xl text-info font-bold uppercase">
                    {{ $t('billing_details') }}
                  </h3>
                  <div>
                    <TextField
                      v-model="form.billing_full_name"
                      name="billing_full_name"
                      :placeholder="$t('billing') + ' | ' + $t('full_name')"
                      :label="$t('billing') + ' | ' + $t('full_name')"
                      :server-error="$page.props.errors.billing_full_name"
                      :disabled="
                        form.useShippingDetails &&
                        form.shipping_full_name !== ''
                      "
                    />
                    <template
                      v-if="form.useShippingDetails && form.shipping_country"
                    >
                      <TextField
                        v-model="form.billing_country"
                        name="billing_country"
                        :placeholder="$t('billing') + ' | ' + $t('country')"
                        :label="$t('billing') + ' | ' + $t('country')"
                        :server-error="$page.props.errors.billing_country"
                        :disabled="true"
                      />
                    </template>
                    <div v-else class="form-control mb-4">
                      <label class="label">
                        <span class="label-text capitalize font-semibold">{{
                          $t('billing') + ' | ' + $t('country')
                        }}</span>
                      </label>
                      <vue-select
                        v-model="form.billing_country"
                        :options="billingCountries"
                        value-by="ar_name"
                        :label-by="
                          $i18n.locale === 'en' ? 'en_name' : 'ar_name'
                        "
                        :placeholder="$t('billing') + ' | ' + $t('country')"
                        close-on-select
                      ></vue-select>
                      <label class="label">
                        <span
                          v-show="$page.props.errors.shipping_country"
                          class="label-text-alt text-error"
                          >{{ $page.props.errors.shipping_country }}</span
                        >
                      </label>
                    </div>
                    <!-- billing country -->
                    <template
                      v-if="form.useShippingDetails && form.shipping_state"
                    >
                      <TextField
                        v-model="form.billing_state"
                        name="billing_state"
                        :placeholder="$t('billing') + ' | ' + $t('state')"
                        :label="$t('billing') + ' | ' + $t('state')"
                        :server-error="$page.props.errors.billing_state"
                        :disabled="true"
                      />
                    </template>
                    <div v-else class="form-control mb-4">
                      <label class="label">
                        <span class="label-text capitalize font-semibold">{{
                          $t('billing') + ' | ' + $t('state')
                        }}</span>
                      </label>
                      <vue-select
                        v-model="form.billing_state"
                        :options="billingStates"
                        value-by="ar_name"
                        :label-by="
                          $i18n.locale === 'en' ? 'en_name' : 'ar_name'
                        "
                        :placeholder="$t('billing') + ' | ' + $t('state')"
                        close-on-select
                        @selected="billingStateSelected"
                        @removed="clearBillingStateSelected"
                      ></vue-select>
                      <label class="label">
                        <span
                          v-show="$page.props.errors.billing_state"
                          class="label-text-alt text-error"
                          >{{ $page.props.errors.billing_state }}</span
                        >
                      </label>
                    </div>
                    <!-- billing state -->
                    <template
                      v-if="form.useShippingDetails && form.shipping_area"
                    >
                      <TextField
                        v-model="form.billing_area"
                        name="billing_area"
                        :placeholder="$t('billing') + ' | ' + $t('area')"
                        :label="$t('billing') + ' | ' + $t('area')"
                        :server-error="$page.props.errors.billing_area"
                        :disabled="true"
                      />
                    </template>
                    <div v-else class="form-control mb-4">
                      <label class="label">
                        <span class="label-text capitalize font-semibold">{{
                          $t('billing') + ' | ' + $t('area')
                        }}</span>
                      </label>
                      <vue-select
                        v-model="form.billing_area"
                        :options="billingAreas"
                        value-by="id"
                        :label-by="
                          $i18n.locale === 'en' ? 'en_name' : 'ar_name'
                        "
                        :placeholder="$t('billing') + ' | ' + $t('area')"
                        close-on-select
                      ></vue-select>
                      <label class="label">
                        <span
                          v-show="$page.props.errors.billing_area"
                          class="label-text-alt text-error"
                          >{{ $page.props.errors.billing_area }}</span
                        >
                      </label>
                    </div>
                    <!-- billing area -->
                    <TextField
                      v-model="form.billing_zip_code"
                      name="billing_zip_code"
                      :placeholder="$t('billing') + ' | ' + $t('zip_code')"
                      :label="$t('billing') + ' | ' + $t('zip_code')"
                      :server-error="$page.props.errors.billing_zip_code"
                      :disabled="
                        form.useShippingDetails && form.shipping_zip_code !== ''
                      "
                    />
                    <TextField
                      v-model="form.billing_avenue"
                      name="billing_avenue"
                      :placeholder="$t('billing') + ' | ' + $t('avenue')"
                      :label="$t('billing') + ' | ' + $t('avenue')"
                      :server-error="$page.props.errors.billing_avenue"
                      :disabled="
                        form.useShippingDetails && form.shipping_avenue !== ''
                      "
                    />
                    <TextField
                      v-model="form.billing_street"
                      name="billing_street"
                      :placeholder="$t('billing') + ' | ' + $t('street')"
                      :label="$t('billing') + ' | ' + $t('street')"
                      :server-error="$page.props.errors.billing_street"
                      :disabled="
                        form.useShippingDetails && form.shipping_street !== ''
                      "
                    />
                    <TextField
                      v-model="form.billing_address"
                      name="billing_address"
                      :placeholder="$t('billing') + ' | ' + $t('address')"
                      :label="$t('billing') + ' | ' + $t('address')"
                      :server-error="$page.props.errors.billing_address"
                      :disabled="
                        form.useShippingDetails && form.shipping_address !== ''
                      "
                    />
                    <TextField
                      v-model="form.billing_phone"
                      name="billing_phone"
                      :placeholder="$t('billing') + ' | ' + $t('phone')"
                      :label="$t('billing') + ' | ' + $t('phone')"
                      :server-error="$page.props.errors.billing_phone"
                      :disabled="
                        form.useShippingDetails && form.shipping_phone !== ''
                      "
                    />
                  </div>
                </div>
                <!-- billing details -->
                <div>
                  <span class="label-text capitalize font-semibold">{{
                    $t('payment_methods')
                  }}</span>
                </div>
                <div class="w-full flex h-full items-center space-x-8">
                  <div class="form-control">
                    <label class="cursor-pointer label justify-start space-x-2">
                      <span class="label-text font-semibold capitalize">{{
                        $t('credit')
                      }}</span>
                      <input
                        v-model="form.payment_method"
                        type="radio"
                        name="payment_method"
                        class="radio"
                        value="credit"
                      />
                    </label>
                  </div>
                  <div class="form-control">
                    <label class="cursor-pointer label justify-start space-x-2">
                      <span class="label-text font-semibold capitalize"
                        >payzah</span
                      >
                      <input
                        v-model="form.payment_method"
                        type="radio"
                        name="payment_method"
                        class="radio"
                        value="payzah"
                      />
                    </label>
                  </div>
                  <p
                    v-if="$page.props.errors.payment_method"
                    class="text-xs text-red-500 font-bold"
                  >
                    {{ $page.props.errors.payment_method }}
                  </p>
                </div>
                <div class="mt-4">
                  <p class="text-neutral text-opastate-60 text-sm">
                    {{ $t('one_available_payment') }},
                    <a class="link italic text-info">{{ $t('payzah_link') }}</a>
                  </p>
                  <div class="form-control">
                    <label class="cursor-pointer label justify-start space-x-2">
                      <input type="checkbox" class="checkbox" />
                      <span
                        class="label-text text-sm font-semibold capitalize"
                        >{{ $t('agree') }}</span
                      >
                    </label>
                  </div>
                </div>
              </div>
              <!-- TODO:: to update to shipping company -->
              <div class="flex w-full justify-center">
                <button type="submit" class="btn btn-info mt-8 btn-block">
                  {{ $t('pay_now') }}
                </button>
              </div>
            </form>
            <div
              class="
                w-full
                lg:w-96
                relative
                lg:sticky lg:top-36
                h-auto
                lg:h-96
                order-first
                lg:order-last
                mb-12
                lg:mb-0
              "
            >
              <div class="flex flex-col space-y-4">
                <h3 class="text-xl text-info font-bold uppercase">
                  {{ $t('payment_details') }}
                </h3>
                <div
                  class="
                    divide-y-2
                    mb-16
                    border-2
                    rounded-box
                    px-4
                    uppercase
                    font-medium
                    text-sm
                  "
                >
                  <div class="flex justify-between py-4">
                    <p>{{ $t('subtotal') }}</p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      {{ $page.props.cartSubtotal }}
                      {{ $i18n.locale === 'en' ? 'dk' : 'دك' }}
                    </p>
                  </div>
                  <div class="flex justify-between py-4">
                    <p>{{ $t('shipping_cost') }}</p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      {{ shipping_cost }}
                      {{ $i18n.locale === 'en' ? 'dk' : 'دك' }}
                    </p>
                  </div>
                  <div class="form-control py-4">
                    <label class="cursor-pointer label justify-start space-x-2">
                      <input
                        v-model="haveCoupon"
                        type="checkbox"
                        class="checkbox checkbox-sm checkbox-accent"
                        :checked="haveCoupon"
                      />
                      <span
                        class="
                          label-text
                          text-xm
                          font-semibold
                          capitalize
                          text-accent
                        "
                        >{{ $t('have_coupon?') }}</span
                      >
                    </label>
                  </div>
                  <form
                    v-show="haveCoupon"
                    class="py-4"
                    @submit.prevent="checkCoupon"
                  >
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">{{
                          $t('enter_coupon_code')
                        }}</span>
                      </label>
                      <div>
                        <div class="flex space-x-2">
                          <input
                            v-model="couponForm.code"
                            type="text"
                            :placeholder="$t('enter_coupon_code')"
                            class="
                              w-full
                              input
                              border-base-300 border-2
                              bg-transparent
                              hover:border-neutral hover:border-opastate-50
                              shadow-sm
                            "
                          />
                          <button class="btn btn-info">
                            {{ $t('apply') }}
                          </button>
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
                  <div>
                    <div class="flex justify-between py-4 items-center">
                      <p>{{ $t('total') }}</p>
                      <p class="bg-gray-200 py-1 px-2 rounded">
                        {{ cartTotal }}{{ $i18n.locale === 'en' ? 'dk' : 'دك' }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- cart total -->
            </div>
          </div>
        </div>
      </HtSection>
    </div>
  </WebLayout>
</template>

<script>
import { ref, watch, computed, reactive, onMounted } from 'vue'
import { Head, useForm, usePage, Link } from '@inertiajs/inertia-vue3'
import { useStore } from 'vuex'
import axios from 'axios'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'
import TextField from '@/Shared/UI/TextField'
import 'vue-next-select/dist/index.css'

export default {
  name: 'WebPageCheckout',
  components: {
    Head,
    WebLayout,
    HtSection,
    TextField,
    Link,
  },

  props: {
    allCountries: {
      type: Array,
      default: () => [],
    },
    countryStates: {
      type: Array,
      default: () => [],
    },
  },

  setup(props) {
    const form = useForm('saveOrder', {
      payment_method: 'payzah',

      billing_full_name: null,
      billing_country: null,
      billing_area: null,
      billing_avenue: null,
      billing_state: null,
      billing_city: null,
      billing_address: null,
      billing_street: null,
      billing_phone: null,
      billing_zip_code: null,

      shipping_full_name: null,
      shipping_state: null,
      shipping_country: null,
      shipping_city: null,
      shipping_address: null,
      shipping_street: null,
      shipping_phone: null,
      shipping_zip_code: null,
      shipping_area: null,
      shipping_avenue: null,
      notes: null,

      country_id: null,
      state_id: null,
      city_id: null,
      area_id: null,
      useShippingDetails: true,
    })
    const couponForm = reactive({
      code: null,
    })
    const page = usePage()
    const store = useStore()
    const useUserInfo = ref(false)
    const user = computed(() => page.props.value.user)
    const shippingCountries = reactive(props.allCountries)
    const shippingStates = reactive(props.countryStates)
    let shippingAreas = reactive([])
    const billingCountries = reactive(props.allCountries)
    const billingStates = reactive(props.countryStates)
    let billingAreas = reactive([])

    let haveCoupon = ref(false)
    let couponValue = ref(null)
    const checkCouponError = reactive([])
    const shipping_cost = ref(0.0)

    const cartTotal = computed(() => {
      return store.state.cartTotal
    })

    watch(useUserInfo, () => {
      form.billing_full_name = !useUserInfo.value ? null : user.value.full_name
      form.shipping_full_name = !useUserInfo.value ? null : user.value.full_name
      form.billing_phone = !useUserInfo.value ? null : user.value.mobile
      form.shipping_phone = !useUserInfo.value ? null : user.value.mobile
    })

    // shipping state logic
    const shippingStateSelected = (e) => {
      e.areas.forEach((area) => {
        shippingAreas.push(area)
      })
    }
    // shipping empty areas if state selected removed
    const clearShippingStateSelected = () => {
      while (shippingAreas.length > 0) {
        shippingAreas.pop()
      }
      if (shipping_cost.value === 0) return
      store.commit(
        'getCartTotal',
        (Number(cartTotal.value) - Number(shipping_cost.value)).toFixed(2),
      )
    }

    // billing state logic
    const billingStateSelected = (e) => {
      e.areas.forEach((area) => {
        billingAreas.push(area)
      })
    }
    // shipping empty areas if state selected removed
    const clearBillingStateSelected = () => {
      while (billingAreas.length > 0) {
        billingAreas.pop()
      }
    }

    // shipping area logic
    const shippingAreaSelected = (e) => {
      shipping_cost.value = 0
      if (!e.shipping_cost || Number(e.shipping_cost) === 0) return
      shipping_cost.value = Number(e.shipping_cost).toFixed(2)
      store.commit(
        'getCartTotal',
        (Number(cartTotal.value) + Number(shipping_cost.value)).toFixed(2),
      )
    }
    // reset cost shipping value if area removed
    const clearShippingAreaSelected = (e) => {
      store.commit(
        'getCartTotal',
        (Number(cartTotal.value) - Number(e.shipping_cost)).toFixed(2),
      )
      shipping_cost.value = 0
    }

    // apply shipping details to billing if useShippingDetails
    watch(
      () => ({ ...form }),
      (val) => {
        if (val.useShippingDetails) {
          form.billing_full_name =
            form.shipping_full_name !== ''
              ? form.shipping_full_name
              : form.billing_full_name
          form.billing_country = form.shipping_country
            ? form.shipping_country
            : form.billing_country
          form.billing_state = form.shipping_state
            ? form.shipping_state
            : form.billing_state
          form.billing_city = form.shipping_city
            ? form.shipping_city
            : form.billing_city
          form.billing_street =
            form.shipping_street !== ''
              ? form.shipping_street
              : form.billing_street
          form.billing_address =
            form.shipping_address !== ''
              ? form.shipping_address
              : form.billing_address
          form.billing_avenue =
            form.shipping_avenue !== ''
              ? form.shipping_avenue
              : form.billing_avenue
          form.billing_area = form.shipping_area
            ? form.shipping_area
            : form.billing_area
          form.billing_zip_code =
            form.shipping_zip_code !== ''
              ? form.shipping_zip_code
              : form.billing_zip_code
          form.billing_phone =
            form.shipping_phone !== ''
              ? form.shipping_phone
              : form.billing_phone
        }
      },
    )

    // check coupon
    // valid test coupon joR4GJroOGfpyTB7
    const checkCoupon = async () => {
      await axios
        .post(route('web.checkCoupon'), couponForm)
        .then((res) => {
          couponValue.value = res.data.coupon.value
          console.log(res.data)
          haveCoupon.value = false
          if (res.data.coupon.type === 'fixed') {
            store.commit(
              'getCartTotal',
              (Number(cartTotal.value) - Number(couponValue.value)).toFixed(2),
            )
          } else {
            store.commit(
              'getCartTotal',
              ((cartTotal.value * couponValue.value) / 100).toFixed(2),
            )
          }
        })
        .catch((error) => {
          if (error.response) {
            console.log(error.response.data)
            while (checkCouponError.length > 0) {
              checkCouponError.pop()
            }
            checkCouponError.push(error.response.data.errors.code[0])
          }
        })
    }

    const checkout = () => {
      form.post(route('web.orders.store'), {
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
            page.props.value.errors &&
            Object.keys(page.props.value.errors).length === 0
          ) {
            form.reset()
            media = []
            store.commit('openNotification', {
              title: 'create tool',
              type: 'success',
              content: 'tool created successfully',
            })
          }
        },
      })
    }

    onMounted(() => {
      store.commit('getCartTotal', page.props.value.cartTotal)
    })

    return {
      checkout,
      form,
      useUserInfo,
      shippingCountries,
      shippingStates,
      billingCountries,
      billingStates,
      billingAreas,
      shippingStateSelected,
      billingStateSelected,
      clearShippingStateSelected,
      clearBillingStateSelected,
      shippingAreaSelected,
      clearShippingAreaSelected,
      shippingAreas,
      haveCoupon,
      couponValue,
      couponForm,
      checkCouponError,
      checkCoupon,
      shipping_cost,
      cartTotal,
    }
  },
}
</script>

<style>
/* VUE SELECT OVERRIDES */
.vue-select {
  width: 100%;
  -tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
    var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  background-color: transparent;
  --tw-border-opacity: 1;
  border-color: hsla(var(--b3) / var(--tw-border-opacity));
  border-width: 2px;
  flex-shrink: 1;
  transition-property: background-color, border-color, color, fill, stroke,
    opacity, box-shadow, transform;
  transition-duration: 0.2s;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  height: 3rem;
  font-size: 0.875rem;
  line-height: 2;
  padding-right: 1rem;
  padding-left: 1rem;
  --tw-bg-opacity: 1;
  border-radius: var(--rounded-btn, 0.5rem);
  padding-bottom: 0.5rem;
  padding-top: 0.5rem;
  cursor: text;
}
.vue-select:hover {
  --tw-border-opacity: 0.5;
  border-color: hsla(var(--n) / var(--tw-border-opacity));
}
.vue-select.direction-bottom .vue-dropdown {
  -tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
    var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  --tw-border-opacity: 1;
  border-color: hsla(var(--b3) / var(--tw-border-opacity));
  border-width: 2px;
  border-bottom-right-radius: var(--rounded-box, 1rem);
  border-bottom-left-radius: var(--rounded-box, 1rem);
}
.vue-select.direction-top .vue-dropdown {
  -tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
    var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  --tw-border-opacity: 1;
  border-color: hsla(var(--b3) / var(--tw-border-opacity));
  border-width: 2px;
  border-top-right-radius: var(--rounded-box, 1rem);
  border-top-left-radius: var(--rounded-box, 1rem);
}
.icon.arrow-downward {
  border-width: 6px 6px 0;
}
.vue-dropdown-item {
  border: 2px solid transparent;
  padding: 0.5rem;
}
.vue-dropdown-item:hover,
.vue-dropdown-item.highlighted {
  --tw-bg-opacity: 1;
  background-color: hsla(var(--in) / var(--tw-bg-opacity, 1));
}
.vue-dropdown-item.selected.highlighted {
  --tw-text-opacity: 1;
  background-color: hsla(var(--a) / var(--tw-text-opacity));
}
.vue-dropdown-item.selected {
  --tw-text-opacity: 0.5;
  background-color: hsla(var(--a) / var(--tw-text-opacity));
}
.vue-select-header input::placeholder {
  color: #6b7280;
}
.vue-input input {
  font-size: inherit;
}
</style>
