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
                    >valid date</span
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
              <div
                v-for="(model, index) in related"
                :key="index"
                class="form-control"
              >
                <label class="cursor-pointer label justify-start space-x-2">
                  <span class="label-text font-semibold capitalize"
                    >{{ model }} coupon</span
                  >
                  <input
                    v-model="form.related"
                    type="radio"
                    name="related"
                    class="radio"
                    :value="model"
                  />
                </label>
              </div>
            </div>
            <!-- coupon related radio  -->
            <div class="w-full flex justify-center my-6">
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
                @click.prevent="openRelatedModal"
              >
                <span>choice {{ form.related }}</span>
              </button>
            </div>
          </ManageForm>
        </div>
      </div>
    </div>
  </ManageLayout>
  <Modal
    max-width="screen-lg"
    :title="`add models to this package`"
    type="info"
    action-title="save selected models and close"
    screen-height
    :disabled-action-btn="form.relatedModels.length === 0"
    @modalAction="saveModelsToCoupon"
  >
    <div class="grid grid-cols-4 gap-8 text-sm">
      <div v-for="model in models" :key="model.id">
        <div class="flex flex-col space-y-2 font-medium">
          <div class="flex justify-center">
            <p
              class="capitalize"
              :class="{ 'text-info font-bold': selectedModel(model) }"
            >
              {{ model.en_name }}
            </p>
          </div>
          <div
            class="flex items-center relative rounded-box group"
            :class="{ 'border-2 border-info': selectedModel(model) }"
          >
            <img
              v-if="model.media.length > 0"
              :src="model.media[0].full_url"
              :alt="model.en_name"
              class="w-full h-48 object-cover rounded-box"
            />
            <div
              v-else
              class="
                w-full
                h-48
                object-cover
                rounded-box
                bg-info bg-opacity-10
                flex
                items-center
                justify-center
              "
            >
              <Product24 class="w-10 h-10 text-base-300" />
            </div>
            <div
              class="
                absolute
                inset-0
                bg-base-300 bg-opacity-80
                items-center
                justify-center
                rounded-box
                hidden
                group-hover:flex
              "
            >
              <button
                v-if="!selectedModel(model)"
                type="button"
                class="
                  btn btn-outline
                  border-2 border-info
                  btn-circle
                  text-info
                  hover:bg-info hover:border-info
                "
                @click.prevent="addModelToCoupon(model)"
              >
                <VueFeather type="plus" stroke-width="3" class="w-4 h-4" />
              </button>
              <button
                v-else
                type="button"
                class="
                  btn btn-outline
                  border-2 border-error
                  btn-circle
                  text-error
                  hover:bg-error hover:border-error
                "
                @click.prevent="removeModelFromCoupon(model)"
              >
                <VueFeather type="minus" stroke-width="3" class="w-4 h-4" />
              </button>
            </div>
          </div>
        </div>
      </div>
      <pre>
        {{ form.relatedModels }}
      </pre>
    </div>
  </Modal>
</template>

<script>
import { ref, onMounted, watch, reactive } from 'vue'
import { useStore } from 'vuex'
import { useForm, usePage } from '@inertiajs/inertia-vue3'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import TextField from '@/Shared/UI/TextField'
import ManageForm from '@/Shared/Layouts/MForm'
import HTextarea from '@/Shared/UI/HTextarea'
import FileUpload from '@/Shared/UI/FileUpload'
import Modal from '@/Shared/Layouts/Modal'
// TODO:: to fix emit checkbox
// import CheckBox from '@/Shared/UI/CheckBox'

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
  FileUpload,
  Modal,
  // CheckBox,
}

export default {
  name: 'ManageCouponCreate',

  components,

  props: {
    collections: {
      type: Array,
      default: () => [],
    },
    products: {
      type: Array,
      default: () => [],
    },
  },

  setup(props) {
    const form = useForm({
      code: null,
      type: 'fixed',
      value: null,
      date: {
        start_date: null,
        expiry_date: null,
      },
      relatedModels: [],
      related: null,
    })

    let models = reactive([])

    const page = usePage()

    const store = useStore()

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

    const related = ref(['product', 'collection' /* 'cart', 'booking' */])
    form.related = related.value[0]

    watch(
      () => form.related,
      (newVal) => {
        switch (newVal) {
          case 'collection':
            models.splice(0, models.length)
            form.relatedModels.splice(0, form.relatedModels.length)
            props.collections.forEach((m) => models.push(m))
            break
          default:
            models.splice(0, models.length)
            form.relatedModels.splice(0, form.relatedModels.length)
            props.products.forEach((m) => models.push(m))
        }
      },
      {
        immediate: true,
        deep: false,
      },
    )

    const openRelatedModal = () => {
      store.commit('openModal')
    }

    const selectedModel = (model) => {
      return form.relatedModels.includes(model.id)
    }

    const saveModelsToCoupon = () => {
      store.commit('closeModal')
    }

    const addModelToCoupon = (model) => {
      form.relatedModels.push(model.id)
    }

    const removeModelFromCoupon = (model) => {
      form.relatedModels.splice(form.relatedModels.indexOf(model.id), 1)
    }

    const createCoupon = () => {
      form.post(route('manage.coupons.store'), {
        preserverState: true,
        onStart: () => console.log('Do Something on start'),
        onFinish: () => console.log('Do Something on finish'),
        onSuccess: () => {
          // TODO:: To solve error message
          if (Object.keys(page.props.value.errors).length === 0) {
            form.reset()
          }
        },
      })
    }

    onMounted(() => {
      models.splice(0, models.length)
      props.products.forEach((m) => models.push(m))
    })

    return {
      form,
      formatter,
      createCoupon,
      generateCouponCode,
      page,
      related,
      openRelatedModal,
      selectedModel,
      addModelToCoupon,
      removeModelFromCoupon,
      saveModelsToCoupon,
      models,
    }
  },

  remember: 'form',
}
</script>
