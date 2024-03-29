<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.products.index')"
        :parent-name="$t('products')"
        parent-icon="grid"
        :active-name="
          $t('action_model', { action: $t('edit'), model: $t('product') })
        "
        active-icon="pen-tool"
        :action-href="route('manage.products.destroy', product.id)"
        :action-name="
          $t('action_model', { model: $t('product'), action: $t('delete') })
        "
        action-icon="trash-2"
      />
    </template>
    <div class="htm-page htm-page__products-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :form-title="
              $t('action_model', { action: $t('edit'), model: $t('product') })
            "
            :btn-title="
              $t('action_model', { action: $t('add'), model: $t('product') })
            "
            max-width="5xl"
            @formSubmitted="createProduct"
          >
            <div class="grid grid-cols-2 gap-x-10 items-center">
              <TextField
                v-model="form.ar_name"
                name="ar_name"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('product'),
                    name: $t('name'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('product'),
                    name: $t('name'),
                    lang: $t('the_arabic'),
                  })
                "
                :server-error="$page.props.errors.ar_name"
              />
              <!-- arabic name -->
              <TextField
                v-model="form.en_name"
                name="en_name"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('product'),
                    name: $t('name'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('product'),
                    name: $t('name'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_name"
              />
              <!-- english name -->
              <HTextarea
                v-model="form.ar_short_description"
                optional
                name="ar_short_description"
                :placeholder="
                  $t('field_name_lang', {
                    name: $t('short_description'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    name: $t('short_description'),
                    lang: $t('the_arabic'),
                  })
                "
                :server-error="$page.props.errors.ar_short_description"
              />
              <!-- arabic short description -->
              <HTextarea
                v-model="form.en_short_description"
                optional
                name="en_short_description"
                :placeholder="
                  $t('field_name_lang', {
                    name: $t('short_description'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    name: $t('short_description'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_short_description"
              />
              <!-- en short description -->
              <HTextarea
                v-model="form.ar_description"
                optional
                name="ar_description"
                :placeholder="
                  $t('field_name_lang', {
                    name: $t('description'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    name: $t('description'),
                    lang: $t('the_arabic'),
                  })
                "
                :server-error="$page.props.errors.ar_description"
              />
              <!-- arabic description -->
              <HTextarea
                v-model="form.en_description"
                optional
                name="en_description"
                :placeholder="
                  $t('field_name_lang', {
                    name: $t('description'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    name: $t('description'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_description"
              />
              <!-- en description -->
              <TextField
                v-model="form.price"
                type="number"
                name="price"
                :placeholder="$t('price')"
                :label="$t('price')"
                :server-error="$page.props.errors.price"
              />
              <!-- product price -->
              <TextField
                v-model="form.supplier_percent_discount"
                optional
                type="number"
                name="supplier_percent_discount"
                :placeholder="$t('supplier_percent_discount')"
                :label="$t('supplier_percent_discount')"
                :server-error="$page.props.errors.supplier_percent_discount"
              />
              <!-- product supplier percent discount -->
              <TextField
                v-model="form.sale_price"
                type="number"
                name="sale_price"
                :placeholder="$t('sale_price')"
                :label="$t('sale_price')"
                :server-error="$page.props.errors.sale_price"
              />
              <!-- product sale price -->
              <TextField
                v-model="form.quantity"
                type="number"
                name="quantity"
                :placeholder="$t('quantity')"
                :label="$t('quantity')"
                :server-error="$page.props.errors.quantity"
              />
              <!-- product quantity -->
              <TextField
                v-model="form.SKU"
                label-top-helper="generate SKU ?"
                name="SKU"
                :placeholder="$t('SKU')"
                :label="$t('SKU')"
                :server-error="$page.props.errors.SKU"
              />
              <!-- product SKU -->
              <div>
                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <input
                      v-model="form.featured"
                      type="checkbox"
                      class="checkbox"
                      name="publish"
                    />
                    <span class="label-text text-sm font-semibold capitalize"
                      >featured product?</span
                    >
                  </label>
                </div>
                <p
                  v-if="form.errors.featured"
                  class="text-xs text-red-500 font-bold"
                >
                  {{ form.errors.featured }}
                </p>
              </div>
              <!-- featured product checkbox -->
            </div>
            <!-- === grid === -->
            <div class="mb-6">
              <div class="mb-2 flex space-x-2 items-center">
                <VueFeather
                  type="image"
                  stroke-width="2.5"
                  class="text-gray-400"
                />
                <span class="label-text capitalize font-semibold"
                  >product image/s</span
                >
              </div>
              <div class="w-full flex mb-4">
                <div
                  v-show="form.media.length > 0"
                  class="
                    w-1/2
                    flex flex-col
                    space-y-4
                    transition
                    ht-base-transition
                  "
                >
                  <div
                    v-for="(img, index) in form.media"
                    :key="index"
                    class="relative flex space-x-2 items-center"
                  >
                    <img
                      :src="img.full_url"
                      :alt="product.en_name"
                      class="
                        rounded-2xl
                        h-16
                        w-16
                        object-cover
                        transition
                        ht-base-transition
                      "
                    />
                    <div class="w-full flex flex-col">
                      <button
                        type="button"
                        class="
                          self-end
                          btn btn-ghost btn-circle btn-xs
                          text-gray-400
                          hover:text-error hover:bg-error hover:bg-opacity-20
                        "
                        @click="removeImg(index, img)"
                      >
                        <VueFeather type="x" class="h-4 w-4" stroke-width="4" />
                      </button>
                      <div class="flex flex-col">
                        <div
                          class="
                            flex
                            space-x-4
                            text-xs
                            font-semibold
                            text-gray-400
                            uppercase
                            mb-2
                            font-sans
                          "
                        >
                          <span>{{ termFileName(img.filename) }}</span>
                          <span class="text-base-300">{{
                            (img.size / 1048576).toFixed(2) + ' MB'
                          }}</span>
                        </div>
                      </div>
                      <progress
                        class="progress"
                        value="100"
                        max="100"
                      ></progress>
                    </div>
                  </div>
                </div>
                <div class="w-1/2" :class="uplaodFileMargin">
                  <FileUpload @input="uploadProductMedia" />
                </div>
              </div>
            </div>
            <!-- Media uplaoder -->
            <div class="mb-6">
              <div class="form-control">
                <label class="cursor-pointer label justify-start space-x-2">
                  <input
                    v-model="form.published"
                    type="checkbox"
                    class="checkbox"
                    name="publish"
                  />
                  <span class="label-text text-sm font-semibold capitalize"
                    >publish</span
                  >
                </label>
              </div>
              <p
                v-if="form.errors.published"
                class="text-xs text-red-500 font-bold"
              >
                {{ form.errors.published }}
              </p>
            </div>
            <!-- published checkbox  -->
          </ManageForm>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import axios from 'axios'
import { Switch } from '@headlessui/vue'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import TextField from '@/Shared/UI/TextField'
import ManageForm from '@/Shared/Layouts/MForm'
import HTextarea from '@/Shared/UI/HTextarea'
import FileUpload from '@/Shared/UI/FileUpload'
// TODO:: to fix emit checkbox
// import CheckBox from '@/Shared/UI/CheckBox'

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
  FileUpload,
  Switch,
  // CheckBox,
}

export default {
  name: 'ManageProductCreate',

  components,

  props: {
    product: { type: Object, default: () => ({}) },
  },

  data() {
    return {
      form: this.$inertia.form({
        ar_name: this.product.ar_name,
        ar_short_description: this.product.ar_short_description,
        ar_description: this.product.ar_description,
        en_name: this.product.en_name,
        en_short_description: this.product.en_short_description,
        en_description: this.product.en_description,
        published: this.product.published,
        price: this.product.price,
        supplier_percent_discount: this.product.supplier_percent_discount,
        sale_price: this.product.sale_price,
        SKU: this.product.SKU,
        stock_status: this.product.stock_status,
        featured: this.product.featured,
        quantity: String(this.product.quantity),
        mediaIds: this.product.mediaIds,
        media: this.product.media,
      }),
    }
  },

  remember: 'form',

  computed: {
    getProductFileSize(file) {
      return (this.form.media[file.id].size / 1048576).toFixed(2) + ' MB'
    },
    uplaodFileMargin() {
      let space
      if (this.$i18n.locale === 'en') {
        space = this.form.media.length > 0 ? 'ml-4' : 'ml-0'
      }
      if (this.$i18n.locale === 'ar') {
        space = this.form.media.length > 0 ? 'mr-4' : 'mr-0'
      }

      return space
    },
  },

  methods: {
    termFileName(name) {
      const length = 24

      const term =
        name.length > length ? name.substring(0, length - 3) + '...' : name

      return term
    },
    uploadProductMedia(files) {
      Array.from(files).forEach((media) => {
        let reader = new FileReader()

        reader.readAsDataURL(media)

        reader.onload = (e) => {
          let item = {
            full_url: e.target.result,
            id: undefined,
            filename: media.name,
            size: media.size,
          }

          let formData = new FormData()

          formData.append('file', media)
          formData.append('directory_name', 'products')

          axios.post(route('manage.media.store'), formData).then((res) => {
            item.id = res.data.id
          })

          this.form.media.push(item)
        }
      })
    },
    removeImg(index, img) {
      this.form.media.splice(index, 1)

      if (img.id) {
        axios.delete(route('manage.media.destroy', img.id)).catch((error) => {
          console.log(error)
          this.form.media.splice(index, 0, img)
        })
      }
    },
    createProduct() {
      this.form.mediaIds = this.form.media.map((img) => img.id)
      this.form.put(this.route('manage.products.update', this.product.id), {
        preserverStae: true,
        onStart: () => console.log('Do Something on start'),
        onFinish: () => console.log('Do Something on finish'),
        onSuccess: () => {
          if (Object.keys(this.$page.props.errors).length === 0) {
            this.form.reset()
            this.form.media = []
            this.form.mediaIds = []
          }
        },
      })
    },
  },
}
</script>

<style>
.progress {
  height: 0.3rem;
}
</style>
