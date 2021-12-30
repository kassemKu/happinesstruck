<template>
  <WebLayout>
    <Head title="Welcome">
      <meta title="CHECKOUT" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-checkout-page bg-base-300 bg-opacity-20">
      <HtSection :padding-x="24">
        <div class="pt-36 pb-12 flex flex-col space-y-8">
          <div
            class="w-full flex flex-col text-center items-center justify-center"
          >
            <h2 class="text-2xl capitalize font-bold leading-10">
              checkout page
            </h2>
            <p class="max-w-md text-neutral text-opacity-60">
              is a free online generator false text. It provides a complete text
              simulator to generate replacement text
            </p>
          </div>
          <div class="bg-base-100 p-8 rounded-box flex space-x-8">
            <form class="w-2/3" @submit.prevent="checkout">
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
                    :placeholder="`Billing | full name`"
                    label="
                    Billing | full name
                  "
                    :server-error="$page.props.errors.billing_full_name"
                  />
                  <TextField
                    v-model="form.billing_state"
                    name="billing_state"
                    :placeholder="`Billing | state`"
                    label="
                    Billing | state
                  "
                    :server-error="$page.props.errors.billing_state"
                  />
                  <TextField
                    v-model="form.billing_city"
                    name="billing_city"
                    :placeholder="`Billing | city`"
                    label="
                    Billing | city
                  "
                    :server-error="$page.props.errors.billing_city"
                  />
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
            <div class="w-1/3 sticky top-0 justify-self-end">
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
import { ref, watch, computed } from 'vue'
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3'
import { useStore } from 'vuex'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'
import TextField from '@/Shared/UI/TextField'

export default {
  name: 'WebPageCheckout',
  components: {
    Head,
    WebLayout,
    HtSection,
    TextField,
  },

  setup() {
    const form = useForm({
      payment_method: 'payzah',

      billing_full_name: null,
      billing_state: null,
      billing_city: null,
      billing_address: null,
      billing_phone: null,
      billing_zip_code: null,

      shipping_full_name: 'to updated',
      shipping_state: 'to updated',
      shipping_city: 'to updated',
      shipping_address: 'to updated',
      shipping_phone: 'to updated',
      shipping_zip_code: 'to updated',
      notes: 'to updated',
    })

    const page = usePage()
    const store = useStore()

    const useUserInfo = ref(false)

    const user = computed(() => page.props.value.user)

    watch(useUserInfo, () => {
      console.log(user.value.full_name)
      form.billing_full_name = !useUserInfo.value ? null : user.value.full_name
      form.shipping_full_name = !useUserInfo.value ? null : user.value.full_name
      form.billing_phone = !useUserInfo.value ? null : user.value.mobile
      form.shipping_phone = !useUserInfo.value ? null : user.value.mobile
    })

    const checkout = () => {
      form.post(route('web.orders.store'), {
        errorBag: 'StoreOrder',
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

    return { checkout, form, useUserInfo }
  },
}
</script>
