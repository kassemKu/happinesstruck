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
              <div class="flex flex-col space-y-6">
                <h3 class="text-xl text-info font-bold uppercase">
                  billing details
                </h3>
                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <input
                      v-model="useUserInfo"
                      type="checkbox"
                      class="checkbox"
                      :checked="useUserInfo"
                    />
                    <span class="label-text text-sm font-semibold capitalize"
                      >use your happiness truck account details?</span
                    >
                  </label>
                </div>
                <div>
                  <TextField
                    v-model="form.billing_full_name"
                    name="billing_full_name"
                    :placeholder="$t('billing') + ' | ' + $t('full_name')"
                    :label="$t('billing') + ' | ' + $t('full_name')"
                    :server-error="$page.props.errors.billing_full_name"
                  />
                  <div class="form-control mb-4">
                    <label class="label">
                      <span class="label-text capitalize font-semibold">{{
                        $t('billing') + ' | ' + $t('country')
                      }}</span>
                    </label>
                    <vue-select
                      v-model="form.country_id"
                      :options="countries"
                      value-by="id"
                      :label-by="$i18n.locale === 'en' ? 'en_name' : 'ar_name'"
                      :placeholder="$t('billing') + ' | ' + $t('country')"
                      close-on-select
                    ></vue-select>
                    <label class="label">
                      <span
                        v-show="$page.props.errors.country_id"
                        class="label-text-alt text-error"
                        >{{ $page.props.errors.country_id }}</span
                      >
                    </label>
                  </div>
                  <!-- country -->
                  <TextField
                    v-model="form.billing_state"
                    name="billing_state"
                    :placeholder="`Billing | state`"
                    label="
                    Billing | state
                  "
                    :server-error="$page.props.errors.billing_state"
                  />
                  <div class="form-control mb-4">
                    <label class="label">
                      <span class="label-text capitalize font-semibold">{{
                        $t('billing') + ' | ' + $t('city')
                      }}</span>
                    </label>
                    <vue-select
                      v-model="form.city_id"
                      :options="cities"
                      value-by="id"
                      :label-by="$i18n.locale === 'en' ? 'en_name' : 'ar_name'"
                      :placeholder="$t('billing') + ' | ' + $t('city')"
                      close-on-select
                      @selected="getAreas"
                      @removed="clearAreas"
                    ></vue-select>
                    <label class="label">
                      <span
                        v-show="$page.props.errors.city_id"
                        class="label-text-alt text-error"
                        >{{ $page.props.errors.city_id }}</span
                      >
                    </label>
                  </div>
                  <!-- city -->
                  <div class="form-control mb-4">
                    <label class="label">
                      <span class="label-text capitalize font-semibold">{{
                        $t('billing') + ' | ' + $t('area')
                      }}</span>
                    </label>
                    <vue-select
                      v-model="form.area_id"
                      :options="areas"
                      value-by="id"
                      :label-by="$i18n.locale === 'en' ? 'en_name' : 'ar_name'"
                      :placeholder="$t('billing') + ' | ' + $t('area')"
                      close-on-select
                    ></vue-select>
                    <label class="label">
                      <span
                        v-show="$page.props.errors.area_id"
                        class="label-text-alt text-error"
                        >{{ $page.props.errors.area_id }}</span
                      >
                    </label>
                  </div>
                  <!-- area -->
                  <TextField
                    v-model="form.billing_zip_code"
                    name="billing_zip_code"
                    :placeholder="`Billing | zip code`"
                    label="
                    Billing | zip code
                  "
                    :server-error="$page.props.errors.billing_zip_code"
                  />
                  <TextField
                    v-model="form.billing_avenue"
                    name="billing_avenue"
                    :placeholder="`Billing | avenue`"
                    label="
                    Billing | avenue
                  "
                    :server-error="$page.props.errors.billing_avenue"
                  />
                  <TextField
                    v-model="form.billing_address"
                    name="billing_address"
                    :placeholder="`Billing | address`"
                    label="
                    Billing | address
                  "
                    :server-error="$page.props.errors.billing_address"
                  />
                  <TextField
                    v-model="form.billing_phone"
                    name="billing_phone"
                    :placeholder="`Billing | phone`"
                    label="
                    Billing | phone
                  "
                    :server-error="$page.props.errors.billing_phone"
                  />
                </div>
                <div class="-my-4">
                  <span class="label-text capitalize font-semibold"
                    >payment methods</span
                  >
                </div>
                <div class="w-full flex h-full items-center space-x-8">
                  <div class="form-control">
                    <label class="cursor-pointer label justify-start space-x-2">
                      <span class="label-text font-semibold capitalize"
                        >credit</span
                      >
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
                  <p class="text-neutral text-opacity-60 text-sm">
                    there is one available payment getaway until now,
                    <a class="link italic text-info"
                      >payment getaway company link</a
                    >
                  </p>
                  <div class="form-control">
                    <label class="cursor-pointer label justify-start space-x-2">
                      <input type="checkbox" class="checkbox" />
                      <span class="label-text text-sm font-semibold capitalize"
                        >agree</span
                      >
                    </label>
                  </div>
                </div>
              </div>
              <!-- TODO:: to update to shipping company -->
              <div class="flex w-full justify-center">
                <button type="submit" class="btn btn-info mt-8 btn-block">
                  pay now
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
              <div class="flex flex-col space-y-6">
                <h3 class="text-xl text-info font-bold uppercase">
                  payment details
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
                    <p>subtotal</p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      {{ $page.props.cartSubtotal }} KD
                    </p>
                  </div>
                  <div>
                    <div class="flex justify-between py-4 items-center">
                      <p>total</p>
                      <p class="bg-gray-200 py-1 px-2 rounded">
                        {{ $page.props.cartTotal }} KD
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
import { ref, watch, computed, reactive } from 'vue'
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3'
import { useStore } from 'vuex'
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
  },

  props: {
    allCountries: {
      type: Array,
      default: () => [],
    },
    countryCities: {
      type: Array,
      default: () => [],
    },
  },

  setup(props) {
    const form = useForm({
      payment_method: 'payzah',

      billing_full_name: null,
      country_id: null,
      area_id: null,
      billing_avenue: null,
      billing_state: null,
      city_id: null,
      billing_address: null,
      billing_phone: null,
      billing_zip_code: null,

      shipping_full_name: 'to updated',
      shipping_state: 'to updated',
      shipping_country: 'to updated',
      shipping_city: 'to updated',
      shipping_address: 'to updated',
      shipping_phone: 'to updated',
      shipping_zip_code: 'to updated',
      shipping_area: 'to updated',
      shipping_avenue: 'to updated',
      notes: 'to updated',
    })

    const page = usePage()
    const store = useStore()
    const useUserInfo = ref(false)
    const user = computed(() => page.props.value.user)
    const countries = reactive(props.allCountries)
    const cities = reactive(props.countryCities)
    let areas = reactive([])

    watch(useUserInfo, () => {
      form.billing_full_name = !useUserInfo.value ? null : user.value.full_name
      form.shipping_full_name = !useUserInfo.value ? null : user.value.full_name
      form.billing_phone = !useUserInfo.value ? null : user.value.mobile
      form.shipping_phone = !useUserInfo.value ? null : user.value.mobile
    })

    const getAreas = (e) => {
      e.areas.forEach((area) => {
        areas.push(area)
      })
    }
    // empty areas if city selected removed
    const clearAreas = () => {
      while (areas.length > 0) {
        areas.pop()
      }
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

    return {
      checkout,
      form,
      useUserInfo,
      countries,
      cities,
      getAreas,
      clearAreas,
      areas,
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
  background-color: #10b981;
}
.vue-dropdown-item.selected {
  background-color: #bbf7d0;
}
.vue-select-header input::placeholder {
  color: #6b7280;
}
</style>
