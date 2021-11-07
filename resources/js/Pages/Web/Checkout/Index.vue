<template>
  <WebLayout>
    <Head title="Welcome">
      <meta title="CHECKOUT" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-checkout-page bg-base-300 bg-opacity-20">
      <HtSection :padding-x="24">
      <div class="pt-36 pb-12 flex flex-col space-y-8">
        <div>
          <h2 class="text-2xl capitalize font-bold leading-10">checkout page</h2>
          <p class="max-w-md text-neutral text-opacity-60">is a free online generator false text. It provides a complete text simulator to generate replacement text</p>
        </div>
        <form class="bg-base-100 p-8 rounded-box" @submit.prevent="checkout">
          <div class="flex space-x-16">
            <div class="flex flex-col space-y-6 w-1/2">
              <h3 class="text-xl text-info font-bold uppercase">billing details</h3>
              <div>
                  <TextField
                  name="billing_full_name"
                  :placeholder="
                    `Billing | full name`
                  "
                  label="
                    Billing | full name
                  "
                  :server-error="$page.props.errors.en_name"
                />
                <TextField
                  name="billing_state"
                  :placeholder="
                    `Billing | state`
                  "
                  label="
                    Billing | state
                  "
                  :server-error="$page.props.errors.en_name"
                />
                <TextField
                  name="billing_city"
                  :placeholder="
                    `Billing | city`
                  "
                  label="
                    Billing | city
                  "
                  :server-error="$page.props.errors.en_name"
                />
                <TextField
                  name="billing_zip_code"
                  :placeholder="
                    `Billing | zip code`
                  "
                  label="
                    Billing | zip code
                  "
                  :server-error="$page.props.errors.en_name"
                />
                <TextField
                  name="billing_address"
                  :placeholder="
                    `Billing | address`
                  "
                  label="
                    Billing | address
                  "
                  :server-error="$page.props.errors.en_name"
                />
                <TextField
                  name="billing_phone"
                  :placeholder="
                    `Billing | phone`
                  "
                  label="
                    Billing | phone
                  "
                  :server-error="$page.props.errors.en_name"
                />
              </div>
              <div class="mt-4">
              <p class="text-neutral text-opacity-60 text-sm">there is one avilable payment getway until now, <a class="link italic text-info">payment getway company link</a></p>
              <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <input
                      type="checkbox"
                      class="checkbox"
                    />
                    <span class="label-text text-sm font-semibold capitalize"
                      >agree</span
                    >
                  </label>
                </div>
              </div>
            </div>
            <div class="flex flex-col space-y-6 w-1/2">
              <h3 class="text-xl text-info font-bold uppercase">shipping details</h3>
              <div>
                  <TextField
                  name="shipping_full_name"
                  :placeholder="
                    `shipping | full name`
                  "
                  label="
                    shipping | full name
                  "
                  :server-error="$page.props.errors.en_name"
                />
                <TextField
                  name="shipping_state"
                  :placeholder="
                    `shipping | state`
                  "
                  label="
                    shipping | state
                  "
                  :server-error="$page.props.errors.en_name"
                />
                <TextField
                  name="shipping_city"
                  :placeholder="
                    `shipping | city`
                  "
                  label="
                    shipping | city
                  "
                  :server-error="$page.props.errors.en_name"
                />
                <TextField
                  name="shipping_zip_code"
                  :placeholder="
                    `shipping | zip code`
                  "
                  label="
                    shipping | zip code
                  "
                  :server-error="$page.props.errors.en_name"
                />
                <TextField
                  name="shipping_address"
                  :placeholder="
                    `shipping | address`
                  "
                  label="
                    shipping | address
                  "
                  :server-error="$page.props.errors.en_name"
                />
                <TextField
                  name="shipping_phone"
                  :placeholder="
                    `shipping | phone`
                  "
                  label="
                    shipping | phone
                  "
                  :server-error="$page.props.errors.en_name"
                />
              </div>
              <div class="mt-4">
              <p class="text-neutral text-opacity-60 text-sm">there is one avilable shipping company until now, <a class="link italic text-info">payment getway company link</a></p>
              <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <input
                      type="checkbox"
                      class="checkbox"
                    />
                    <span class="label-text text-sm font-semibold capitalize"
                      >agree</span
                    >
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="flex w-full justify-center">
            <button type="submit" class="btn btn-info w-1/2 mt-8">pay now</button>
          </div>
        </form>
      </div>
      </HtSection>
    </div>
  </WebLayout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'
import TextField from '@/Shared/UI/TextField'

export default {
  name: 'WebPageCheckout',
  components: {
    Head,
    WebLayout,
    HtSection,
    TextField
  },

  setup() {
    const checkout = () => {
      console.log('checkout page')
    }

    return { checkout }
  }
}
</script>
