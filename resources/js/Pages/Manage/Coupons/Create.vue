<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.coupons.index')"
        :parent-name="$t('coupons')"
        parent-icon="grid"
        :active-name="
          $t('action_model', { action: $t('add'), model: $t('coupon') })
        "
        active-icon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__coupons-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :form-title="
              $t('action_model', { action: $t('add'), model: $t('coupon') })
            "
            max-width="5xl"
            :btn-title="
              $t('action_model', { action: $t('add'), model: $t('coupon') })
            "
            @formSubmitted="createCoupon"
          >
            <div class="grid grid-cols-2 gap-x-10 items-center">
              <TextField
                v-model="form.code"
                name="code"
                :placeholder="$t('coupon_code')"
                :label="$t('coupon_code')"
                label-top-helper="generate code ?"
                :server-error="$page.props.errors.code"
                @topHelperAction="generateCouponCode"
              />
              <TextField
                v-model="form.value"
                name="value"
                type="number"
                :placeholder="$t('coupon_value')"
                :label="$t('coupon_value')"
                :server-error="$page.props.errors.value"
              />
              <div class="w-full flex h-full items-center space-x-8 my-4">
                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <span class="label-text font-semibold capitalize"
                      >fixed</span
                    >
                    <input
                      v-model="form.type"
                      type="radio"
                      name="type"
                      class="radio"
                      value="fixed"
                    />
                  </label>
                </div>

                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <span class="label-text font-semibold capitalize"
                      >percent</span
                    >
                    <input
                      v-model="form.type"
                      type="radio"
                      name="type"
                      class="radio"
                      value="percent"
                    />
                  </label>
                </div>

                <p
                  v-if="$page.props.errors.type"
                  class="text-xs text-red-500 font-bold"
                >
                  {{ $page.props.errors.type }}
                </p>
              </div>
              <!-- type radio  -->
              <div class="form-control mb-4">
                <label class="label">
                  <span class="label-text capitalize font-semibold"
                    >event date</span
                  ></label
                >
                <litepie-datepicker
                  v-model="form.date"
                  i18n="id"
                  :shortcuts="false"
                  separator=" TO "
                ></litepie-datepicker>
              </div>
              <!-- coupon date -->
            </div>
            <div class="w-full flex h-full items-center space-x-8 my-4">
              <div class="form-control">
                <label class="cursor-pointer label justify-start space-x-2">
                  <span class="label-text font-semibold capitalize">fixed</span>
                  <input
                    v-model="form.type"
                    type="radio"
                    name="type"
                    class="radio"
                    value="fixed"
                  />
                </label>
              </div>

              <div class="form-control">
                <label class="cursor-pointer label justify-start space-x-2">
                  <span class="label-text font-semibold capitalize"
                    >coupon related to</span
                  >
                  <input
                    v-model="form.related"
                    type="radio"
                    name="type"
                    class="radio"
                    value="percent"
                  />
                </label>
              </div>
            </div>
            <!-- type radio  -->
          </ManageForm>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import { ref } from 'vue'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import TextField from '@/Shared/UI/TextField'
import ManageForm from '@/Shared/Layouts/MForm'
import HTextarea from '@/Shared/UI/HTextarea'
import FileUpload from '@/Shared/UI/FileUpload'
import { useForm, usePage } from '@inertiajs/inertia-vue3'
// TODO:: to fix emit checkbox
// import CheckBox from '@/Shared/UI/CheckBox'

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
  FileUpload,
  // CheckBox,
}

export default {
  name: 'ManageCouponCreate',

  components,

  props: {
    collections: {
      type: Object,
      default: () => ({}),
    },
  },

  setup() {
    const form = useForm({
      code: null,
      type: 'fixed',
      value: null,
      date: {
        start_date: null,
        expiry_date: null,
      },
      related: 'product',
    })

    const page = usePage()

    const formatter = ref({
      date: 'DD MMM YYYY',
      month: 'MMM',
    })

    // const disabledDate = (date) => {
    //   return date < new Date()
    // }

    const generateCouponCode = () => {
      const char =
        'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'

      let code = ''

      for (let i = 0; i < 16; i++) {
        code += char.charAt(Math.floor(Math.random() * char.length))
      }

      form.code = code
    }

    const related = ref(['collection', 'product', 'cart'])

    const createCoupon = () => {
      form.post(route('manage.coupons.store'), {
        preserverState: true,
        onStart: () => console.log('Do Something on start'),
        onFinish: () => console.log('Do Something on finish'),
        onSuccess: () => {
          // TODO:: To solve error message
          if (Object.keys(page.props.errors).length === 0) {
            form.reset()
          }
        },
      })
    }

    return { form, formatter, createCoupon, generateCouponCode, page, related }
  },

  remember: 'form',
}
</script>
